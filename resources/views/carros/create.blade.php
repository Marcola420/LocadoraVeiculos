@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-6">
    <div class="border-b border-gray-100 pb-6 mb-8">
        <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">Novo <span class="text-indigo-600">Veículo</span></h2>
        <p class="text-gray-500 mt-1">Cadastre um novo carro na frota da locadora.</p>
    </div>

    <form action="{{ route('carros.store') }}" method="POST">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-10">
            
            <div class="space-y-2">
                <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider">Marca</label>
                <input type="text" name="marca" placeholder="Ex: Chevrolet" required
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 outline-none transition-all shadow-sm">
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider">Modelo</label>
                <input type="text" name="modelo" placeholder="Ex: Onix" required
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 outline-none transition-all shadow-sm">
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider">Placa</label>
                <input type="text" name="placa" placeholder="ABC-1234" required
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 outline-none transition-all shadow-sm font-mono uppercase">
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider">Ano</label>
                <input type="number" name="ano" placeholder="2024" required
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 outline-none transition-all shadow-sm">
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider">Valor da Diária (R$)</label>
                <input type="number" step="0.01" name="valor_diaria" placeholder="0.00" required
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 outline-none transition-all shadow-sm">
            </div>

        </div>

        <div class="mt-12 pt-8 border-t border-gray-100 flex items-center justify-end gap-4">
            <a href="{{ route('carros.index') }}" class="px-6 py-3 text-sm font-bold text-gray-500 hover:text-gray-800 transition-colors">
                Cancelar
            </a>
            <button type="submit" 
                class="bg-gray-900 hover:bg-black text-white px-10 py-3 rounded-xl font-bold shadow-xl transition-all hover:-translate-y-1">
                Cadastrar Carro
            </button>
        </div>
    </form>
</div>
@endsection