<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use Illuminate\Http\Request;

class CarroController extends Controller
{
   public function index()
{
    $carros = Carro::all();
    return view('carros.index', compact('carros'));
}

 public function create()
{
    return view('carros.create');
}

    public function store(Request $request)
    {
        $request->validate([
            'marca' => 'required',
            'modelo' => 'required',
            'ano' => 'required|digits:4',
            'placa' => 'required|unique:carros',
            'valor_diaria' => 'required|numeric'
        ]);

        Carro::create($request->all());

        return redirect()->route('carros.index')
            ->with('success', 'Carro cadastrado com sucesso!');
    }

    public function edit(Carro $carro)
    {
        return view('carros.edit', compact('carro'));
    }

    public function update(Request $request, Carro $carro)
    {
        $request->validate([
            'marca' => 'required',
            'modelo' => 'required',
            'ano' => 'required|digits:4',
            'placa' => 'required|unique:carros,placa,' . $carro->id,
            'valor_diaria' => 'required|numeric'
        ]);

        $carro->update($request->all());

        return redirect()->route('carros.index')
            ->with('success', 'Carro atualizado com sucesso!');
    }

    public function destroy(Carro $carro)
    {
        $carro->delete();

        return redirect()->route('carros.index')
            ->with('success', 'Carro removido com sucesso!');
    }
}
