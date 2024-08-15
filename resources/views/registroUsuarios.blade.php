<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Registro Usuarios</title>
</head>

<body class="bg-[#EBEBE)]">
    <header class="flex justify-between items-center bg-opacity-75 bg-[#94B6E4]" style="height: 70px;">
        <div class=" flex flex-row items-center px-3 py-3">
            <img src="img/logo-login.png" width="50" height="50"> 
            <h1 class="text-2xl font-bold">MediSync</h1>
        </div>
        <div class="px-4 py-2">
            <a href="/verUsuarios" class=" px-4 py-4 hover:text-white">Ver usuarios</a>
            <a href="/registroUsuarios" class=" px-4 py-4 hover:text-white">Registrar Empleado</a>
        </div>
        <div class="px-3 py-3 flex flex-row items-center">
            <a href="/logout" class="px-4 py-2 flex flex-row hover:text-white">
                <img src="img/cerrar-sesion.png" class="mr-2" height="25" width="25">
                Cerrar sesión
            </a>
        </div>
    </header>
        <div class="flex items-center justify-center mt-5 mb-5">
            <div class="bg-[#94B6E4] bg-opacity-50 p-8 md:p-10 rounded-lg shadow-xl w-full max-w-md">
                <h2 class="text-3xl font-bold text-center mb-6">Registro de usuarios</h2>
                <form action="{{ route('validar-registro') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre"
                            class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            placeholder="Nombre(s)" required>
                    </div>
                    <div class="mb-4">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" name="apellidos" id="apellidos"
                            class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            placeholder="Apellidos(s)" required>
                    </div>
                    <div class="mb-4">
                        <label for="tipoUsuario">Tipo de usuario</label>
                        <select name="tipoUsuario" id="tipoUsuario"
                            class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            required>
                            <option value="">Seleccione una opción</option>
                            <option value="recepcionista">Recepcionista</option>
                            <option value="doctor">Doctor</option>
                            <option value="admin">Administrador</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="area">Área o especialidad</label>
                        <input type="text" name="area" id="area"
                            class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            placeholder="Área" required>
                    </div>
                    <div class="mb-4">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" id="password"
                            class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            placeholder="Contraseña" required>
                    </div>
                    <div class="mb-4">
                        <label for="email">Correo</label>
                        <input type="email" name="correo" id="correo"
                            class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            placeholder="Correo" required>
                    </div>
                    <div class="mb-4">
                        <label for="telefono">Teléfono</label>
                        <input type="tel" name="telefono" id="telefono"
                            class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            placeholder="Número de teléfono" required>
                    </div>

                    <div class="flex-grow flex items-center justify-center mt-6">
                        <button type="submit"
                            class="w-2/3 flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-full text-white bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Registrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>