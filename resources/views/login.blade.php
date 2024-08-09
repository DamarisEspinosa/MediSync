<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Login</title>
</head>

<body class="bg-[#EBEBE9] flex flex-row items-center justify-center max-w-full" style="height: 100vh; margin: 0; padding:0;">
    <div style="width: 50%;" class=" flex flex-row items-center justify-center h-full">
        <img src="img/logo-login.png" height="350" width="350">
    </div>
    <div style="width: 45%;" class="bg-[#94B6E4] bg-opacity-50 p-8 rounded-lg shadow-xl w-full max-w-sm">
        <div class="flex flex-col items-center mb-6">
            <h2 class="text-4xl font-bold mb-6">Inicia sesión</h2>
        </div>
        <form class="w-full" action="{{ route('verificar-login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="correo" class="block text-sm font-medium">Correo</label>
                <input type="email" name="correo" id="correo"
                    class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                    placeholder="Correo" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium">Password</label>
                <input type="password" name="password" id="password"
                    class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                    placeholder="Password" required>
            </div>
            
            <div class="flex-grow flex items-center justify-center mt-6">
                <button type="submit"
                    class="w-2/3 flex justify-center py-2 px-6 border border-transparent text-sm font-medium rounded-full text-white bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Iniciar sesión
                </button>
            </div>
        </form>
    </div>
</body>

</html>
