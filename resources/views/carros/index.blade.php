@extends('layouts.app')

@section('content')
<div class="flex flex-col">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Frota de Veículos</h2>
            <p class="text-sm text-gray-500">Gerencie os carros disponíveis para locação</p>
        </div>
        <a href="{{ route('carros.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Novo Carro
        </a>
    </div>

    <div class="overflow-x-auto bg-white rounded-xl">
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr class="bg-gray-50">
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Modelo / Marca</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Placa</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Ano</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider text-center">Diária</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider text-center">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Ações</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                @foreach($carros as $carro)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-semibold text-gray-900">{{ $carro->modelo }}</div>
                        <div class="text-xs text-gray-500">{{ $carro->marca }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 font-mono">{{ $carro->placa }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $carro->ano }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center font-bold">
                        R$ {{ number_format($carro->valor_diaria, 2, ',', '.') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        @if($carro->disponivel)
                            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-700">Disponível</span>
                        @else
                            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-700">Alugado</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex gap-3">
                        <a href="{{ route('carros.edit', $carro->id) }}" class="text-indigo-600 hover:text-indigo-900 font-semibold">Editar</a>
                        <form action="{{ route('carros.destroy', $carro->id) }}" method="POST" onsubmit="return confirm('Excluir este veículo?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900 font-semibold">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection