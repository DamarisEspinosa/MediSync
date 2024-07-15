<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <title>Agenda</title>

    <!-- Incluye los estilos de FullCalendar -->
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core@5.11.0/main.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@5.11.0/main.min.css" rel="stylesheet">
</head>
<body class="bg-[#EBEBE9] bg-cover bg-center h-screen m-0 p-0">
    <header class="flex justify-between items-center bg-opacity-75" style="background: #94B6E4; height: 70px;">
        <div class="flex flex-row items-center px-4">
            <img src="img/MediSync.png" width="50" height="50">
            <h1 class="text-2xl font-bold ml-2">MediSync</h1>
        </div>
        <div class="px-4 py-2">
            <a href=" {{ route('doctor') }} " class=" px-4 py-4 hover:text-white">Pacientes</a>
            <a href="{{ route('registrarCita') }}" class="px-4 py-4 hover:text-white">Registrar cita</a>
            <a href="{{ route('agenda') }}" class="px-4 py-4 hover:text-white">Agenda</a>
            <a href="{{ route('productos') }}" class="px-4 py-4 hover:text-white">Productos</a>
            <a href=" {{ route('servicios') }} " class=" px-4 py-4 hover:text-white">Servicios</a> 
            <a href=" {{ route('ventas') }} " class=" px-4 py-4 hover:text-white">Ventas</a> 
        </div>
        <div class="px-4">
            <a href="{{ route('do-logout') }}" class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600">Cerrar sesión</a>
        </div>
    </header>
    <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-lg">
        <div id="calendar"></div>
    </div>

    <!-- Incluye los scripts de FullCalendar -->
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@5.11.0/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@5.11.0/main.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            fetch('/info-citas')
                .then(response => response.json())
                .then(events => {
                    console.log(events); // Imprimir los eventos en la consola
                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        plugins: [ 'dayGrid' ],
                        initialView: 'dayGridMonth',
                        events: events, // La URL para obtener las citas
                        eventColor: '#28a745', // Color verde para los eventos
                    });

                    calendar.render();
                });
        });
    </script>
</body>
</html>
