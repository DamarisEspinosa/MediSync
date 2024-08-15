<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Producto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#EBEBE9]">
    <header class="flex justify-between items-center bg-opacity-75 bg-[#94B6E4]" style="height: 70px;">
        <div class=" flex flex-row items-center px-3 py-3">
            <img src="img/logo-login.png" width="50" height="50"> 
            <h1 class="text-2xl font-bold">MediSync</h1>
        </div>
        <div class="px-4 py-2">
            <a href="/recepcionista" class=" px-4 py-4 hover:text-white">Agenda</a>
            <a href="/verServicios" class=" px-4 py-4 hover:text-white">Servicios</a>
            <a href="/verPacientes" class=" px-4 py-4 hover:text-white">Pacientes</a>
            <a href="/Productos" class=" px-4 py-4 hover:text-white">Productos</a>
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
                <h2 class="text-3xl font-bold text-center mb-6">Modificar Producto</h2>
                @if(session('success'))
                    <div class="bg-green-600 text-white p-4 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('Productos.update', $producto->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" value="{{ $producto->nombre }}"
                            class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            placeholder="Nombre del producto" required>
                    </div>
                    @error('nombre')
                    <div class="bg-red-500 text-white p-2 rounded mb-4">{{ $message }}</div>
                    @enderror
                    <div class="mb-4">
                        <label for="marca">Marca</label>
                        <input type="text" name="marca" id="marca" value="{{ $producto->marca }}"
                            class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            placeholder="Nombre del producto" required>
                    </div>
                    @error('marca')
                    <div class="bg-red-500 text-white p-2 rounded mb-4">{{ $message }}</div>
                    @enderror
                    <div class="mb-4">
                        <label for="costo">Costo</label>
                        <input type="number" name="costo" id="costo" value="{{ $producto->costo }}"
                            class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            placeholder="Costo" required>
                    </div>
                    @error('costo')
                    <div class="bg-red-500 text-white p-2 rounded mb-4">{{ $message }}</div>
                    @enderror
                    <div class="mb-4 flex items-center bg-white bg-opacity-20 rounded-md shadow-sm">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" name="cantidad" id="cantidad" value="{{ $producto->cantidad}}"
                            class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            placeholder="Cantidad" required>
                    </div>
                    @error('cantidad')
                    <div class="bg-red-500 text-white p-2 rounded mb-4">{{ $message }}</div>
                    @enderror
                    <div class="flex-grow flex items-center justify-center mt-6">
                        <button type="submit"
                            class="w-2/3 flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Actualizar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
