<?php

namespace App\Http\Controllers;

use App\Models\Aluguel;
use App\Models\Cliente;
use App\Models\Carro;
use Illuminate\Http\Request;

class AluguelController extends Controller
{
    public function index()
    {
        $aluguels = Aluguel::with('cliente', 'carro')->get();
        return view('aluguels.index', compact('aluguels'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $carros = Carro::all();
        return view('aluguels.create', compact('clientes', 'carros'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required',
            'carro_id' => 'required',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after_or_equal:data_inicio',
        ]);

        // Verifica se cliente é novo (digitado)
        $cliente_id = $request->cliente_id;
        if(!is_numeric($cliente_id)) {
            $cliente = Cliente::create(['nome' => $cliente_id]);
            $cliente_id = $cliente->id;
        }

        // Verifica se carro é novo (digitado)
        $carro_id = $request->carro_id;
        if(!is_numeric($carro_id)) {
            $carro = Carro::create([
                'marca' => $carro_id, // aqui você pode separar marca/modelo se quiser
                'modelo' => '',
                'valor_diaria' => 100, // valor padrão, pode mudar
                'status' => 'disponivel'
            ]);
            $carro_id = $carro->id;
        } else {
            $carro = Carro::findOrFail($carro_id);
            if($carro->status !== 'disponivel') {
                return redirect()->back()->with('error', 'Este carro já está alugado.');
            }
        }

        $dias = (strtotime($request->data_fim) - strtotime($request->data_inicio)) / (60*60*24) + 1;
        $valor_total = $dias * $carro->valor_diaria;

        $aluguel = Aluguel::create([
            'cliente_id' => $cliente_id,
            'carro_id' => $carro_id,
            'data_inicio' => $request->data_inicio,
            'data_fim' => $request->data_fim,
            'valor_total' => $valor_total,
            'status' => 'ativo',
        ]);

        // Marcar carro como alugado
        $carro->update(['status' => 'alugado']);

        return redirect()->route('aluguels.index')->with('success', 'Aluguel cadastrado com sucesso!');
    }

    public function edit(Aluguel $aluguel)
    {
        $clientes = Cliente::all();
        $carros = Carro::all();
        return view('aluguels.create', compact('aluguel', 'clientes', 'carros'));
    }

    public function update(Request $request, Aluguel $aluguel)
    {
        $request->validate([
            'cliente_id' => 'required',
            'carro_id' => 'required',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after_or_equal:data_inicio',
        ]);

        // Cliente
        $cliente_id = $request->cliente_id;
        if(!is_numeric($cliente_id)) {
            $cliente = Cliente::create(['nome' => $cliente_id]);
            $cliente_id = $cliente->id;
        }

        // Carro
        $carro_id = $request->carro_id;
        if(!is_numeric($carro_id)) {
            $carro = Carro::create([
                'marca' => $carro_id,
                'modelo' => '',
                'valor_diaria' => 100,
                'status' => 'disponivel'
            ]);
            $carro_id = $carro->id;
        } else {
            $carro = Carro::findOrFail($carro_id);

            if($carro->id != $aluguel->carro_id && $carro->status !== 'disponivel') {
                return redirect()->back()->with('error', 'O carro selecionado já está alugado.');
            }
        }

        $dias = (strtotime($request->data_fim) - strtotime($request->data_inicio)) / (60*60*24) + 1;
        $valor_total = $dias * $carro->valor_diaria;

        // Se mudou de carro, liberar antigo e alugar novo
        if($carro->id != $aluguel->carro_id) {
            $aluguel->carro->update(['status' => 'disponivel']);
            $carro->update(['status' => 'alugado']);
        }

        $aluguel->update([
            'cliente_id' => $cliente_id,
            'carro_id' => $carro_id,
            'data_inicio' => $request->data_inicio,
            'data_fim' => $request->data_fim,
            'valor_total' => $valor_total,
        ]);

        return redirect()->route('aluguels.index')->with('success', 'Aluguel atualizado com sucesso!');
    }

    public function destroy(Aluguel $aluguel)
    {
        if($aluguel->status === 'ativo') {
            $aluguel->carro->update(['status' => 'disponivel']);
        }

        $aluguel->delete();
        return redirect()->route('aluguels.index')->with('success', 'Aluguel excluído com sucesso!');
    }

    public function finalizar(Aluguel $aluguel)
    {
        if($aluguel->status === 'finalizado') {
            return redirect()->back()->with('error', 'Aluguel já finalizado.');
        }

        $aluguel->update([
            'status' => 'finalizado',
            'data_final_entregue' => now(),
        ]);

        $aluguel->carro->update(['status' => 'disponivel']);

        return redirect()->route('aluguels.index')->with('success', 'Aluguel finalizado com sucesso!');
    }
}
