@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-6">
    <div class="border-b border-gray-100 pb-6 mb-8">
        <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">Novo <span class="text-indigo-600">Aluguel</span></h2>
        <p class="text-gray-500 mt-1">Preencha os dados abaixo para registrar uma nova locação.</p>
    </div>

    <form action="{{ route('aluguels.store') }}" method="POST">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-10">
            
            <div class="space-y-2">
                <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider">Cliente</label>
                <select name="cliente_id" class="select2 w-full">
                    <option value="">Selecione o cliente...</option>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider">Carro</label>
                <select name="carro_id" class="select2 w-full">
                    <option value="">Selecione o veículo...</option>
                    @foreach($carros as $carro)
                        <option value="{{ $carro->id }}">{{ $carro->modelo }} - {{ $carro->marca }} ({{ $carro->placa }})</option>
                    @endforeach
                </select>
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider">Data de Início</label>
                <input type="date" name="data_inicio" 
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 outline-none transition-all shadow-sm">
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider">Data de Devolução</label>
                <input type="date" name="data_fim" 
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 outline-none transition-all shadow-sm">
            </div>

        </div>

        <div class="mt-12 pt-8 border-t border-gray-100 flex items-center justify-end gap-4">
            <a href="{{ route('aluguels.index') }}" 
               class="px-6 py-3 text-sm font-bold text-gray-500 hover:text-gray-800 transition-colors">
                Cancelar
            </a>
            <button type="submit" 
                class="bg-gray-900 hover:bg-black text-white px-10 py-3 rounded-xl font-bold shadow-xl transition-all hover:-translate-y-1">
                Salvar Registro
            </button>
        </div>
    </form>
</div>
@endsection