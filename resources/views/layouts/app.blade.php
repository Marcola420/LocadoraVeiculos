<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locadora | Loc'Bem</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">

    <nav class="bg-gray-900 text-white shadow-lg w-full z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-2">
                    <a href="{{ route('carros.index') }}" class="text-2xl font-bold tracking-tight hover:text-indigo-400 transition">
                        Loc'<span class="text-indigo-400">Bem</span>
                    </a>
                </div>

                <div class="hidden md:flex space-x-8 font-medium">
                    <a href="{{ route('carros.index') }}" class="hover:text-indigo-400 transition {{ request()->routeIs('carros.*') ? 'text-indigo-400 border-b-2 border-indigo-400' : '' }}">Carros</a>
                    <a href="{{ route('clientes.index') }}" class="hover:text-indigo-400 transition {{ request()->routeIs('clientes.*') ? 'text-indigo-400 border-b-2 border-indigo-400' : '' }}">Clientes</a>
                    <a href="{{ route('aluguels.index') }}" class="hover:text-indigo-400 transition {{ request()->routeIs('aluguels.*') ? 'text-indigo-400 border-b-2 border-indigo-400' : '' }}">Aluguéis</a>
                </div>

                <div class="flex items-center space-x-4">
                    <div class="hidden sm:flex flex-col items-end">
                        <span class="text-[10px] uppercase text-gray-400 tracking-wider">Operador</span>
                        <span class="text-sm font-semibold text-indigo-300">{{ session('usuario')->nome ?? 'Usuário' }}</span>
                    </div>
                    <a href="{{ route('logout') }}" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-bold transition flex items-center gap-2">
                        <span>Sair</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow max-w-7xl mx-auto px-4 py-10 w-full">
        @if(session('success'))
            <div class="mb-6 flex items-center bg-green-50 text-green-700 p-4 rounded-xl border border-green-100 shadow-sm">
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white p-8 rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100">
            @yield('content')
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({ width: '100%' });
        });
    </script>
    @stack('scripts')
</body>
</html>