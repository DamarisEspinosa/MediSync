<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Registro Pacientes</title>
</head>


<body style="background: #EBEBE9; background-size: cover; background-position: center; height: 100vh; margin: 0; padding: 0;">
<header class="flex justify-between items-center bg-opacity-75" style="background: #94B6E4; height: 70px;" >
        <h1 class="text-2xl font-bold">MediSync</h1>
        <a href="#"><button class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600">Cerrar sesión</button></a>
    </header>
    
    <div class="flex items-center justify-center h-screen" style="margin-top: -5px;">
        <div class="bg-opacity-75 p-8 md:p-10 rounded-lg shadow-xl flex flex-col items-center w-full max-w-2xl" style="background: #CDD6FF;"> 
            <h2 class="text-3xl font-bold">Registro nuevos pacientes</h2>
            <form class="mt-6 w-full grid grid-cols-2 gap-4" action="{{ route('registrar-pacientes') }}" method="POST">
                @csrf
                <div class="col-span-2">
                    <label for="nombre" class="block text-sm font-medium">Nombre(s)</label>
                    <input type="text" name="nombre" id="nombre"
                        class="mt-1 block w-full px-3 py-2 bg-transparent border-gray-300 border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                </div>
                <div>
                    <label for="correo" class="block text-sm font-medium">Correo</label>
                    <input type="email" name="correo" id="correo"
                        class="mt-1 block w-full px-3 py-2 bg-transparent border-2 border-black rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                </div>
                <div>
                    <label for="telefono" class="block text-sm font-medium">Número de teléfono</label>
                    <input type="tel" name="telefono" id="telefono"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                </div>
                <div class="col-span-2 flex space-x-4 justify-between">
                    <div class="flex-1 ml-4">
                        <label for="fechaNacimiento" class="block text-sm font-medium">Fecha de nacimiento</label>
                        <input type="date" name="fechaNacimiento" id="fechaNacimiento"
                            class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    <div class="flex-1">
                        <label for="altura" class="block text-sm font-medium">Altura</label>
                        <input type="text" name="altura" id="altura"
                            class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    <div class="flex-1 ml-4">
                        <label for="peso" class="block text-sm font-medium">Peso</label>
                        <input type="text" name="peso" id="peso"
                            class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    <div class="flex-1 ml-4">
                        <label for="genero" class="block text-sm font-medium">Género</label>
                        <select name="genero" id="genero"
                            class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <option value="masculino">Masculino</option>
                            <option value="femenino">Femenino</option>
                            <option value="prefiero-no-especificar">Prefiero no especificar</option>
                        </select>
                    </div>
                </div>
                <div class="col-span-2">
                    <label for="alergias" class="block text-sm font-medium">Alergias</label>
                    <input type="text" name="alergias" id="alergias"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>

                <div class="col-span-2 flex justify-between mt-6">
                    <button type="submit"
                        style="margin-right: 16px;" 
                        class="w-2/3 flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-full text-white bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Registrar
                    </button>
                    <button type="button"
                        class="w-2/3 flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-full text-white bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 " onclick="location.href='/recepcionista'">
                        Regresar
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>