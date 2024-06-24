<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Registro Administrador</title>
</head>


<body style="background: #EBEBE9; background-size: cover; background-position: center; height: 100vh; margin: 0; padding: 0;">
    <header class="flex justify-between items-center bg-opacity-75" style="background: #94B6E4; height: 70px;" >
        <div class=" flex flex-row items-center" style="padding: 10px 20px;">
            <img src="img/MediSync.png" width="50" height="50"> 
            <h1 class="text-2xl font-bold">MediSync</h1>
        </div>
        <div class="px-4 py-2">
            <a href=" {{ route('registroMedicos') }} " class="px-4 py-4 hover:text-white">Registrar médico</a>
            <a href=" {{ route('registroSecretarias') }} " class=" px-4 py-4 hover:text-white">Registrar secretaria</a>
            <a href=" {{ route('registrarAdmin') }} " class=" px-4 py-4 hover:text-white">Registrar administrador</a>
        </div>
        <div style="padding: 10px 20px;">
            <a href=" {{ route('do-logout') }} " class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600">Cerrar sesión</a>
        </div>
    </header>

    <div class="flex flex-col items-center justify-center mt-6">
        <h2 class="font-bold text-2xl">Médicos</h2>
        <div class="w-4xl bg-white bg-opacity-75 rounded-lg p-4">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b border-gray-300">Nombre</th>
                        <th class="py-2 px-4 border-b border-gray-300">Fecha de nacimiento</th>
                        <th class="py-2 px-4 border-b border-gray-300">Teléfono</th>
                        <th class="py-2 px-4 border-b border-gray-300">Correo</th>
                        <th class="py-2 px-4 border-b border-gray-300">Especialización</th>
                        <th class="py-2 px-4 border-b border-gray-300">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-300 whitespace-nowrap">Luisana Guadalupe</td>
                        <td class="py-2 px-4 border-b border-gray-300 text-center">12/08/2023</td>
                        <td class="py-2 px-4 border-b border-gray-300 text-center">04:45</td>
                        <td class="py-2 px-4 border-b border-gray-300 text-center">04:45</td>
                        <td class="py-2 px-4 border-b border-gray-300 text-center">04:45</td>
                        <td class="py-2 px-4 border-b border-gray-300 text-center"><button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" onclick="location.href='/detallesPacientes'">ver detalles</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="flex flex-col items-center justify-center mt-6">
        <h2 class="font-bold text-2xl">Secretarias</h2>
        <div class="max-w-4xl bg-white bg-opacity-75 rounded-lg p-4">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                    <th class="py-2 px-4 border-b border-gray-300">Nombre</th>
                        <th class="py-2 px-4 border-b border-gray-300">Fecha de nacimiento</th>
                        <th class="py-2 px-4 border-b border-gray-300">Teléfono</th>
                        <th class="py-2 px-4 border-b border-gray-300">Correo</th>
                        <th class="py-2 px-4 border-b border-gray-300">Área</th>
                        <th class="py-2 px-4 border-b border-gray-300">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-300 whitespace-nowrap">Luisana Guadalupe</td>
                        <td class="py-2 px-4 border-b border-gray-300 text-center">12/08/2023</td>
                        <td class="py-2 px-4 border-b border-gray-300 text-center">04:45</td>
                        <td class="py-2 px-4 border-b border-gray-300 text-center">04:45</td>
                        <td class="py-2 px-4 border-b border-gray-300 text-center">04:45</td>
                        <td class="py-2 px-4 border-b border-gray-300 text-center"><button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" onclick="location.href='/detallesPacientes'">ver detalles</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>