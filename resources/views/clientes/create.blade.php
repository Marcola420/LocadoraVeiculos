@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-6">
    <div class="border-b border-gray-100 pb-6 mb-8">
        <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">Novo <span class="text-indigo-600">Cliente</span></h2>
        <p class="text-gray-500 mt-1">Cadastre os dados pessoais do novo cliente.</p>
    </div>

    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-10">
            
            <div class="col-span-1 md:col-span-2 space-y-2">
                <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider">Nome Completo</label>
                <input type="text" name="nome" placeholder="Digite o nome completo" required
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 outline-none transition-all shadow-sm">
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider">CPF</label>
                <input type="text" name="cpf" placeholder="000.000.000-00" required
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 outline-none transition-all shadow-sm">
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider">Telefone</label>
                <input type="text" name="telefone" placeholder="(00) 00000-0000" required
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 outline-none transition-all shadow-sm">
            </div>

            <div class="col-span-1 md:col-span-2 space-y-2">
                <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider">E-mail</label>
                <input type="email" name="email" placeholder="cliente@exemplo.com" required
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 outline-none transition-all shadow-sm">
            </div>

        </div>

        <div class="mt-12 pt-8 border-t border-gray-100 flex items-center justify-end gap-4">
            <a href="{{ route('clientes.index') }}" class="px-6 py-3 text-sm font-bold text-gray-500 hover:text-gray-800 transition-colors">
                Cancelar
            </a>
            <button type="submit" 
                class="bg-gray-900 hover:bg-black text-white px-10 py-3 rounded-xl font-bold shadow-xl transition-all hover:-translate-y-1">
                Salvar Cliente
            </button>
        </div>
    </form>
</div>
@endsection