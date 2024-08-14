<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Ventas</title>
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
            <a href="/ventas" class=" px-4 py-4 hover:text-white">Ventas</a>
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
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <h2 class="text-3xl font-bold text-center mb-6">Venta de productos</h2>
                <form action="{{ route('ventas.store') }}" method="POST">
                    @csrf
                    <fieldset class="mb-4">
                        <legend class="sr-only">Información de la venta</legend>
                        <div class="mb-4">
                            <label for="nombre_producto">Nombre de producto</label>
                            <select name="nombre_producto" id="nombre_producto"
                                class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                required>
                                <option value="">Selecciona un producto</option>
                                @foreach ($productos as $producto)
                                    <option value="{{ $producto->id }}" data-costo="{{ $producto->costo }}">
                                        {{ $producto->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="nombre_paciente">Nombre de paciente</label>
                            <select name="nombre_paciente" id="nombre_paciente"
                                class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                required>
                                <option value="">Seleccione un paciente</option>
                                @foreach ($pacientes as $paciente)
                                    <option value="{{ $paciente->id }}">{{ $paciente->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="fecha_hora">Fecha y hora</label>
                            <input type="datetime-local" name="fecha_hora" id="fecha_hora"
                                class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                value="{{ now()->format('Y-m-d\TH:i') }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="cantidad">Cantidad</label>
                            <input type="number" name="cantidad" id="cantidad"
                                class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                min="1" required>
                        </div>
                        <div class="mb-4">
                            <label for="total_pago">Pago total</label>
                            <span id="total_pago"
                                class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                style="cursor: default;"></span>
                        </div>
                    </fieldset>
                    <div class="flex-grow flex items-center justify-center mt-3">
                        <button type="submit"
                            class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Vender
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const productoSelect = document.getElementById('nombre_producto');
            const cantidadInput = document.getElementById('cantidad');
            const totalPagoSpan = document.getElementById('total_pago');

            const updateTotalPago = () => {
                const costo = productoSelect.options[productoSelect.selectedIndex].dataset.costo || 0;
                const cantidad = cantidadInput.value || 0;
                const totalPago = costo * cantidad;
                totalPagoSpan.textContent = totalPago.toFixed(2);
            };

            productoSelect.addEventListener('change', function() {
                const productoId = this.value;
                fetch(`/ventas/max-stock/${productoId}`)
                    .then(response => response.json())
                    .then(data => {
                        cantidadInput.max = data.maxStock;
                        cantidadInput.value = '';
                        totalPagoSpan.textContent = '0.00';
                    })
                    .catch(error => console.error('Error:', error));
            });

            cantidadInput.addEventListener('input', function() {
                const cantidad = parseInt(cantidadInput.value);
                const maxStock = parseInt(cantidadInput.max);

                if (cantidad > maxStock) {
                    alert(`No se puede registrar. Ingrese una cantidad menor o igual a ${maxStock}`);
                    cantidadInput.value = '';
                } else if (cantidad <= 0) {
                    alert('La cantidad debe ser mayor a 0');
                    cantidadInput.value = '';
                }

                updateTotalPago();
            });

            productoSelect.addEventListener('change', updateTotalPago);
        });
    </script>
</body>
</html>