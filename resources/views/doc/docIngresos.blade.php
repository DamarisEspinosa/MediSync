<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Ingresos Diarios</title>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var inputSearch = document.querySelector('.search-input');
            var tbody = document.querySelector('tbody');

            inputSearch.addEventListener('change', function (e) {
                var selectedDate = e.target.value.trim();

                var rows = tbody.getElementsByTagName('tr');

                for (var i = 0; i < rows.length; i++) {
                    var row = rows[i];

                    var dateCell = row.querySelector('.fecha-dia');
                    if (dateCell) {
                        var rowDate = dateCell.textContent.trim();
                        if (rowDate === selectedDate) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    }
                }
            });
        });
    </script>
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

        <div class="flex-1 flex flex-col p-6">
            <div class="flex justify-center mt-6">
                <div class="relative w-2/3 max-w-2xl">
                    <input type="date" placeholder="Buscar por fecha"
                        class="w-full py-2 pl-4 pr-10 border border-blue-500 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 search-input">
                    <svg class="absolute right-3 top-2.5 w-5 h-5 text-blue-500" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-4.35-4.35M16.44 11.2a5.45 5.45 0 11-10.89 0 5.45 5.45 0 0110.89 0z" />
                    </svg>
                </div>
            </div>

            <div class="overflow-x-auto mt-6">
                
                @foreach ($ingresos as $fecha => $data)
                    <h2 class="text-2xl font-bold text-black mb-4 mt-6">{{ $fecha }}</h2>
                    <table class="min-w-full bg-white bg-opacity-10 rounded-lg shadow-xl text-white mb-6">
                        <thead>
                            <tr class="bg-[#94B6E4] text-black">
                                <th class="py-2 px-4 text-left">Cliente</th>
                                <th class="py-2 px-4 text-left">Servicio</th>
                                <th class="py-2 px-4 text-left">Cita</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['ventas'] as $venta)
                                <tr class="text-black">
                                    <td class="py-2 px-4 fecha-dia" style="display:none;">{{ $fecha }}</td>
                                    <td class="py-2 px-4">{{ $venta->paciente->nombre }}</td>
                                    <td class="py-2 px-4">{{ $venta->total_pago }}</td>
                                    <td class="py-2 px-4">-</td>
                                </tr>
                            @endforeach
                            @foreach ($data['citas'] as $cita)
                                <tr class="text-black">
                                    <td class="py-2 px-4 fecha-dia" style="display:none;">{{ $fecha }}</td>
                                    <td class="py-2 px-4">{{ $cita->paciente->nombre }}</td>
                                    <td class="py-2 px-4">-</td>
                                    <td class="py-2 px-4">{{ $cita->total }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="bg-[#94B6E4] text-black">
                                <td class="py-2 px-4 font-bold" colspan="2">Total del Día</td>
                                <td class="py-2 px-4 font-bold">{{ $data['totalDia'] }}</td>
                            </tr>
                        </tfoot>
                    </table>
                @endforeach
                
            </div>
        </div>
    </div>
</body>

</html>
