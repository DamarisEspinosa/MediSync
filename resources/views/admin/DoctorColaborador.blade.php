<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Ver doctor colaborador</title>
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
            <a href="/verUsuarios" class=" px-4 py-4 hover:text-white">Ver usuarios</a> 
            <a href="/registroUsuarios" class=" px-4 py-4 hover:text-white">Registrar Empleado</a>
            <a href="/DoctorColaborador" class=" px-4 py-4 hover:text-white">Médico colaborador</a>
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
                            <th class="py-2 px-4 text-center border-2">Correo</th>
                            <th class="py-2 px-4 text-center border-2">Numero</th>
                            <th class="py-2 px-4 text-center border-2">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($doctores))
                            @foreach ($doctores as $doctor)
                                <tr>
                                    <td class="py-2 px-4">{{ $doctor->nombre_completo }}</td>
                                    <td class="py-2 px-4 text-center">{{ $doctor->correo }}</td>
                                    <td class="py-2 px-4 text-center">{{ $doctor->telefono ?? 'N/A' }}</td>
                                    <td class="py-2 px-4 text-center flex flex-row justify-center">
                                        <a href="/modificarDoctor/{{ $doctor->id }}" class="w-20">
                                            <img src="img/editar.png" height="18" width="18"> 
                                        </a>
                                        <form action="{{ route('doctores.eliminar', $doctor->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirmDelete()">
                                                <img src="img/eliminar2.png" class="mr-2" height="18" width="16">
                                            </button>
                                        </form>
                                    </td>                                    
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="w-full flex flex-col items-center mt-5">
                <a href="/registroDoctor" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                    Nuevo médico colaborador
                </a>
            </div>
        </div>
</body>
<script>
    function confirmDelete() {
        return confirm('¿Estás seguro de que deseas eliminar al médico colaborador?');
    }
</script>

</html>
