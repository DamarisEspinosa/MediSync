<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Bienvenida recepcionista</title>
</head>

<body style="background: #EBEBE9; background-size: cover; background-position: center; height: 100vh; margin: 0; padding: 0;">
    <header class="flex justify-between items-center bg-opacity-75" style="background: #94B6E4; height: 70px;" >
        <div class=" flex flex-row items-center" style="padding: 10px 20px;">
            <img src="img/MediSync.png" width="50" height="50"> 
            <h1 class="text-2xl font-bold">MediSync</h1>
        </div>
        <div class="px-4 py-2">
            <a href=" {{ route('registroPacientes') }} " class="px-4 py-4 hover:text-white">Registrar paciente</a>
            <a href=" {{ route('registroCitas') }} " class="px-4 py-4 hover:text-white">Agendar cita</a>
        </div>
        <div style="padding: 10px 20px;">
            <a href=" {{ route('do-logout') }} " class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600">Cerrar sesión</a>
        </div>
    </header>

    <div class="flex justify-center mt-6">
        <div class="relative w-2/3 max-w-2xl">
            <input type="text" placeholder="Buscar"
                class="w-full py-2 pl-4 pr-10 border border-blue-500 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500">
            <svg class="absolute right-3 top-2.5 w-5 h-5 text-blue-500" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-4.35-4.35M16.44 11.2a5.45 5.45 0 11-10.89 0 5.45 5.45 0 0110.89 0z" />
            </svg>
        </div>
    </div>

    <div class="flex-grow flex items-center justify-center mt-6">
        <div class="w-full max-w-7xl bg-white bg-opacity-75 rounded-lg p-6">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b border-gray-300">Nombre</th>
                        <th class="py-2 px-4 border-b border-gray-300">Correo</th>
                        <th class="py-2 px-4 border-b border-gray-300">Fecha de cita</th>
                        <th class="py-2 px-4 border-b border-gray-300">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-300 whitespace-nowrap">Luisana Guadalupe</td>
                        <td class="py-2 px-4 border-b border-gray-300">luisanasalas2508@gmail.com</td>
                        <td class="py-2 px-4 border-b border-gray-300 text-center">12/08/2023</td>
                        <td class="py-2 px-4 border-b border-gray-300 text-center"><button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-60">Editar</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
