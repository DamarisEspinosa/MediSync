<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Productos</title>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var inputSearch = document.querySelector(
            '.search-input'); 
            var tbody = document.querySelector('tbody');

            inputSearch.addEventListener('input', function(e) {
                var filterValue = e.target.value.toLowerCase();
                var rows = tbody.getElementsByTagName('tr');

                for (var i = 0; i < rows.length; i++) {
                    var row = rows[i];
                    var match = false;

                    var cells = row.getElementsByTagName('td');
                    for (var j = 0; j < cells.length && !match; j++) {
                        var cellText = cells[j].textContent || cells[j].innerText;
                        match |= cellText.toLowerCase().indexOf(filterValue) !== -1;
                    }

                    if (match) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                }
            });
        });
    </script>
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

        <div class="flex-1 flex flex-col p-6">
            <div class="flex flex-col mt-6 items-center">
                <div class="relative w-2/3 max-w-2xl">
                    <input type="text" placeholder="Buscar"
                        class="w-full py-2 pl-4 pr-10 border border-blue-500 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 search-input">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-4.35-4.35M16.44 11.2a5.45 5.45 0 11-10.89 0 5.45 5.45 0 0110.89 0z" />
                    </svg>
                </div>
            </div>
            <div class="overflow-x-auto mt-6">
                <table class="min-w-full bg-white bg-opacity-10 rounded-lg shadow-xl">
                    <thead>
                        <tr class="bg-[#94B6E4]">
                            <th class="py-2 px-4 text-left border-2">Nombre</th>
                            <th class="py-2 px-4 text-center border-2">Marca</th>
                            <th class="py-2 px-4 text-center border-2">Costo</th>
                            <th class="py-2 px-4 text-center border-2">Cantidad</th>
                            <th class="py-2 px-4 text-center border-2">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($productos))
                            @foreach ($productos as $producto)
                                <tr>
                                    <td class="py-2 px-4">{{ $producto->nombre}}</td>
                                    <td class="py-2 px-4 text-center">{{ $producto->marca}}</td>
                                    <td class="py-2 px-4 text-center">${{ $producto->costo}}</td>
                                    <td class="py-2 px-4 text-center">{{ $producto->cantidad}}</td>
                                    <td class="py-2 px-4 text-center">
                                        <form action="{{ route('Productos.edit', $producto->id) }}" method="get">
                                            <button type="submit">
                                                <img src="img/editar.png" width="20" height="20">
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="w-full flex flex-row justify-center">
            <a href="/registrarProducto" 
                class="mr-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                Agregar producto
            </a>
            <a href="/vender" 
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                Vender
            </a>
        </div>
</body>
</html>
