<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Expediente Medico</title>
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
                <h2 class="text-3xl font-bold text-center mb-4">Expediente Medico</h2>
                <div class="flex-grow flex items-center justify-center mt-6">
                    <table class="min-w-full bg-white bg-opacity-10 rounded-lg shadow-xl text-white">
                        <thead>
                            <tr class="bg-[#94B6E4]">
                                <th class="py-2 px-4 text-center">Fecha cita</th>
                                <th class="py-2 px-4 text-center">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($citas as $cita)
                            <tr>
                                <td class="py-2 px-4 text-center">{{ $cita->fecha->format('d/m/Y') }}</td>
                                <td class="py-2 px-4 text-center">
                                    <a href="/detallesCita/{{ $cita->id }}">
                                                <img src="img/detalles.png" height="15" width="15">
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>