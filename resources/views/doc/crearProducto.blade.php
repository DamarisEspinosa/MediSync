<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de productos</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#EBEBE9]">
    <header class="flex justify-between items-center bg-opacity-75 bg-[#94B6E4]" style="height: 70px;">
        <div class=" flex flex-row items-center" style="padding: 10px 20px;">
            <img src="img/logo-login.png" width="50" height="50"> 
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
                <img src="img/cerrar-sesion.png" class="mr-2" height="25" width="25">
                Cerrar sesión
            </a>
        </div>
    </header>

        <div class="flex items-center justify-center mt-5 mb-5">
            <div class="bg-[#94B6E4] bg-opacity-50 p-8 md:p-10 rounded-lg shadow-xl w-full max-w-md">
                <div class="my-4">
                    @session('succes')
                        <div class="alert alert-success" role="alert">
                            {{ $value }}
                        </div>
                    @endsession
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h2 class="text-3xl font-bold text-center mb-6">Registro de productos</h2>
                <form action="{{ route('crearProducto.store') }}" method="POST">
                    @csrf
                    <fieldset class="mb-4">
                        <legend class="sr-only">Información del producto</legend>
                        <div class="mb-4">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre"
                                class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                placeholder="Nombre del producto" required>
                        </div>
                        <div class="mb-4">
                            <label for="marca">Marca</label>
                            <input type="text" name="marca" id="marca"
                                class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                placeholder="Marca del producto" required>
                        </div>
                        <div class="mb-4">
                            <label for="costo">Costo</label>
                            <input type="number" name="costo" id="costo"
                                class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                placeholder="Costo" required>
                        </div>
                        <div class="mb-4">
                            <label for="cantidad">Cantidad</label>
                            <input type="number" name="cantidad" id="cantidad"
                                class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                placeholder="Cantidad" required>
                        </div>
                    </fieldset>
                    <div class="flex-grow flex items-center justify-center mt-3">
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
