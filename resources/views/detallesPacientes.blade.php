<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Detalles Pacientes</title>
</head>

<body class="bg-[#EBEBE9]">
    <header class="flex justify-between items-center bg-opacity-75 bg-[#94B6E4]" style="height: 70px;">
        <div class=" flex flex-row items-center" style="padding: 10px 20px;">
            <img src="../img/logo-login.png" width="50" height="50"> 
            <h1 class="text-2xl font-bold">MediSync</h1>
        </div>
        <div class="px-4 py-2">
            <a href="/doctor" class=" px-4 py-4 hover:text-white">Agenda</a>
            <a href="/docPacientes" class=" px-4 py-4 hover:text-white">Pacientes</a>
            <a href="/docServicios" class=" px-4 py-4 hover:text-white">Servicios</a>
            <a href="/docProductos" class=" px-4 py-4 hover:text-white">Productos</a>
            <a href="/docIngresos" class=" px-4 py-4 hover:text-white">Ingresos</a>
        </div>
        <div class="px-3 py-3 flex flex-row items-center">
            <a href="/logout" class="px-4 py-2 flex flex-row hover:text-white">
                <img src="../img/cerrar-sesion.png" class="mr-2" height="25" width="25">
                Cerrar sesión
            </a>
        </div>
    </header>

        <div class="flex items-center justify-center mt-5 mb-5">
            <div class="bg-[#94B6E4] bg-opacity-50 p-8 md:p-10 rounded-lg shadow-xl w-full max-w-5xl">
                <h2 class="text-3xl font-bold text-center mb-4">Detalles del paciente</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-2">
                        <label class="block font-medium">Nombre</label>
                        <p class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            {{ $paciente->nombre }}
                        </p>
                    </div>
                    <div class="mb-2">
                        <label class="block font-medium">Apellidos</label>
                        <p class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            {{ $paciente->apellidos }}
                        </p>
                    </div>
                    <div class="mb-2">
                        <label class="block font-medium">Edad</label>
                        <p class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            {{ $paciente->edad }}
                        </p>
                    </div>
                    <div class="mb-2">
                        <label class="block font-medium">Género</label>
                        <p class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            {{ $paciente->genero }}
                        </p>
                    </div>
                    <div class="mb-2">
                        <label class="block font-medium">Altura</label>
                        <p class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            {{ $paciente->altura }}
                        </p>
                    </div>
                    <div class="mb-2">
                        <label class="block font-medium">Peso</label>
                        <p class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            {{ $paciente->peso }}
                        </p>
                    </div>
                    <div class="mb-2">
                        <label class="block font-medium">Enfermedades que padece</label>
                        <p class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            {{ $paciente->enfermedades }}
                        </p>
                    </div>
                    <div class="mb-2">
                        <label class="block font-medium">Alergias</label>
                        <p class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            {{ $paciente->alergias }}
                        </p>
                    </div>
                    <div class="mb-2">
                        <label class="block font-medium">Teléfono</label>
                        <p class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            {{ $paciente->telefono }}
                        </p>
                    </div>
                    <div class="mb-2">
                        <label class="block font-medium">Correo</label>
                        <p class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            {{ $paciente->correo }}
                        </p>
                    </div>
                </div>
                <div class="flex justify-center mt-6">
                    <a href="#" class="w-2/3 flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-full text-white bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Ver expediente
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
