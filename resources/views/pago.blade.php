<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Ver Pagos</title>
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
                        <tr class="bg-blue-500">
                            <th class="py-2 px-4 text-left border-2">Servicio</th>
                            <th class="py-2 px-4 text-center border-2">Costo</th>
                            <th class="py-2 px-4 text-center border-2">Fecha</th>
                            <th class="py-2 px-4 text-center border-2">Estado</th>
                            <th class="py-2 px-4 text-center border-2">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($citas as $cita)
                            <tr class="hover:bg-blue-600">
                                <td class="py-2 px-4">{{ $cita->tipo_servicio->nombre }}</td>
                                <td class="py-2 px-4 text-center">${{ $cita->total}}</td>
                                <td class="py-2 px-4 text-center">{{ $cita->fecha->format('d/m/Y') }}</td>
                                <td class="py-2 px-4 text-center">
                                    @if ($cita->estado == 'Pendiente')
                                        <span class="text-yellow-500 font-bold">Pendiente</span>
                                    @else
                                        <span class="text-green-500 font-bold">Pagado</span>
                                    @endif
                                </td>
                                <td class="py-2 px-4 text-center">
                                    <form action="{{ route('cambiarEstadoPago', $cita->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="paciente_id" value="{{ $id }}">
                                        @if ($cita->estado == 'Pendiente')
                                            <button type="submit"
                                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">
                                                Pagado
                                            </button>
                                        @else
                                            <button type="submit"
                                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
                                                Pendiente
                                            </button>
                                        @endif
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="flex justify-end mt-6">
                <h3 class="text-xl font-bold text-gray-800">Total: <span class="text-blue-500">
                    ${{ $citas->where('estado', 'Pendiente')->sum(fn($cita) => $cita->total) }}
                </span></h3>
            </div>
        </div>
</body>

</html>
