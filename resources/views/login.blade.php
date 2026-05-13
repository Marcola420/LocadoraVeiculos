<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Locadora Pro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md">
        <div class="text-center mb-10">
            <h1 class="text-3xl font-bold text-gray-900 tracking-tight">Locadora<span class="text-indigo-600">Veículos</span></h1>
            <p class="text-gray-500 mt-2">Gestão de frotas e aluguéis</p>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100">
            <h2 class="text-xl font-semibold text-gray-800 mb-6">Acesse sua conta</h2>

            @if(session('erro'))
                <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6">
                    <p class="text-red-700 text-sm">{{ session('erro') }}</p>
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST" class="space-y-5">
                @csrf
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Login</label>
                    <input type="text" name="login" required
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all placeholder-gray-400"
                        placeholder="Digite seu usuário">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Senha</label>
                    <input type="password" name="senha" required
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all placeholder-gray-400"
                        placeholder="••••••••">
                </div>

                <div class="flex items-center justify-between py-2">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" class="h-4 w-4 text-indigo-600 border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-600">Lembrar de mim</label>
                    </div>
                </div>

                <button type="submit" 
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded-lg transition-colors shadow-lg shadow-indigo-200">
                    Entrar no sistema
                </button>
            </form>
        </div>

        <p class="text-center text-gray-400 text-sm mt-8">
            &copy; 2026 Locadora de Veículos. Todos os direitos reservados.
        </p>
    </div>

</body>
</html>