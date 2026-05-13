@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-800">Editar Veículo</h2>
        <p class="text-sm text-gray-500">Atualize as informações do carro no sistema</p>
    </div>

    <form action="{{ route('carros.update', $carro->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Marca</label>
                <input type="text" name="marca" value="{{ $carro->marca }}" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Modelo</label>
                <input type="text" name="modelo" value="{{ $carro->modelo }}" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Placa</label>
                <input type="text" name="placa" value="{{ $carro->placa }}" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 outline-none font-mono">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Valor da Diária (R$)</label>
                <input type="number" step="0.01" name="valor_diaria" value="{{ $carro->valor_diaria }}" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 outline-none">
            </div>
        </div>

        <div class="flex items-center justify-end space-x-4 pt-4">
            <a href="{{ route('carros.index') }}" class="text-gray-500 hover:text-gray-700 font-medium">Cancelar</a>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-6 rounded-lg shadow-lg shadow-indigo-200 transition">
                Salvar Alterações
            </button>
        </div>
    </form>
</div>
@endsection