@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-800">Editar Aluguel</h2>
        <p class="text-sm text-gray-500">Ajuste datas ou valores da locação</p>
    </div>

    <form action="{{ route('aluguels.update', $aluguel->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="col-span-1">
                <label class="block text-sm font-medium text-gray-700 mb-1">Cliente</label>
                <select name="cliente_id" class="select2">
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}" {{ $aluguel->cliente_id == $cliente->id ? 'selected' : '' }}>
                            {{ $cliente->nome }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-1">
                <label class="block text-sm font-medium text-gray-700 mb-1">Carro</label>
                <select name="carro_id" class="select2">
                    @foreach($carros as $carro)
                        <option value="{{ $carro->id }}" {{ $aluguel->carro_id == $carro->id ? 'selected' : '' }}>
                            {{ $carro->modelo }} ({{ $carro->placa }})
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Data Início</label>
                <input type="date" name="data_inicio" value="{{ $aluguel->data_inicio }}" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Data Fim</label>
                <input type="date" name="data_fim" value="{{ $aluguel->data_fim }}" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 outline-none">
            </div>
        </div>

        <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-100">
            <a href="{{ route('aluguels.index') }}" class="text-gray-500 hover:text-gray-700 font-medium">Voltar</a>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-8 rounded-lg shadow-lg transition">
                Salvar Alterações
            </button>
        </div>
    </form>
</div>
@endsection