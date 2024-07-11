<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <title>Agenda</title>
</head>
<body class="bg-[#EBEBE9] bg-cover bg-center h-screen m-0 p-0">
    <header class="flex justify-between items-center bg-opacity-75" style="background: #94B6E4; height: 70px;">
        <div class="flex flex-row items-center" style="padding: 10px 20px;">
            <img src="img/MediSync.png" width="50" height="50"> 
            <h1 class="text-2xl font-bold">MediSync</h1>
        </div>
        <div class="px-4 py-2">
            <a href="{{ route('registrarPacientes') }}" class="px-4 py-4 hover:text-white">Registrar paciente</a>
            <a href="{{ route('registrarCita') }}" class="px-4 py-4 hover:text-white">Registrar cita</a>
            <a href="{{ route('agenda') }}" class="px-4 py-4 hover:text-white">Agenda</a>
            <a href="{{ route('productos') }}" class="px-4 py-4 hover:text-white">Productos</a>
            <a href=" {{ route('servicios') }} " class=" px-4 py-4 hover:text-white">Servicios</a> 
        </div>
        <div style="padding: 10px 20px;">
            <a href="{{ route('do-logout') }}" class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600">Cerrar sesión</a>
        </div>
    </header>
    <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-lg">
        <div id="calendar" style="padding: 50px;"></div>
    </div>
</body>
</html>
