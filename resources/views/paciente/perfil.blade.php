<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Perfil del Paciente</title>
</head>

<body class="bg-[#EBEBE9]">
<header class="flex justify-between items-center bg-opacity-75 bg-[#94B6E4]" style="height: 70px;">
        <div class=" flex flex-row items-center px-3 py-3">
            <img src="img/logo-login.png" width="50" height="50"> 
            <h1 class="text-2xl font-bold">MediSync</h1>
        </div>
        <div class="px-3 py-3 flex flex-row items-center">
            <a href="/logout" class="px-4 py-2 flex flex-row hover:text-white">
                <img src="img/cerrar-sesion.png" class="mr-2" height="25" width="25">
                Cerrar sesión
            </a>
        </div>
    </header>
        <div class="flex-grow p-10">
            <div class="bg-[#94B6E4] bg-opacity-50 p-8 md:p-10 rounded-lg shadow-xl w-full max-w-md mb-6">
                <h2 class="text-3xl font-bold text-center mb-4">Detalles del paciente</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p><span class="font-semibold">Nombre(s):</span> {{ $paciente->nombre }}</p>
                        <p><span class="font-semibold">Apellido(s):</span> {{ $paciente->apellidos }}</p>
                        <p><span class="font-semibold">Edad:</span> {{ $paciente->edad }}</p>
                        <p><span class="font-semibold">Género:</span> {{ $paciente->genero }}</p>
                        <p><span class="font-semibold">Teléfono:</span> {{ $paciente->telefono }}</p>
                        <p><span class="font-semibold">Correo:</span> {{ $paciente->correo }}</p>
                        <p><span class="font-semibold">Altura:</span> {{ $paciente->altura }}</p>
                        <p><span class="font-semibold">Peso:</span> {{ $paciente->peso }}</p>
                        <p><span class="font-semibold">Enfermedades:</span> {{ $paciente->enfermedades ?: 'N/A' }}</p>
                        <p><span class="font-semibold">Alergias:</span> {{ $paciente->alergias ?: 'N/A' }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white bg-opacity-10 text-white p-8 rounded-lg shadow-lg">
                <h2 class="text-3xl font-bold text-white text-center mb-4">Expediente Médico</h2>
                <table class="min-w-full bg-white bg-opacity-10 rounded-lg shadow-xl text-white">
                    <thead>
                        <tr class="bg-[#94B6E4]">
                            <th class="py-2 px-4 text-center">Fecha de la cita</th>
                            <th class="py-2 px-4 text-center">Hora de la cita</th>
                            <th class="py-2 px-4 text-center">Más detalles</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($citas->isNotEmpty())
                            @foreach($citas as $cita)
                                <tr>
                                    <td class="py-2 px-4 text-center">{{ $cita->fecha->format('Y-m-d') }}</td>
                                    <td class="py-2 px-4 text-center">{{ $cita->formatted_hora }}</td>
                                    <td class="py-2 px-4 text-center">
                                        <a href="{{ route('generate.pdf', ['id' => $cita->id]) }}">
                                            <img src="img/descargar.png" width="15" height="15">
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3" class="py-2 px-4 text-center">No hay citas disponibles</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
