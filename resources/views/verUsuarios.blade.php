<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Ver Usuarios</title>
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
            <div class="flex justify-center mt-6">
                <div class="relative w-2/3 max-w-2xl">
                    <input type="text" placeholder="Buscar"
                        class="w-full py-2 pl-4 pr-10 border border-blue-500 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 search-input">
                </div>
            </div>
            <div class="overflow-x-auto mt-6">
                <table class="min-w-full bg-white bg-opacity-10 rounded-lg shadow-xl">
                    <thead class=" text-center">
                        <tr class="bg-[#94B6E4]">
                            <th class="py-2 px-4 border-2">Nombre completo</th>
                            <th class="py-2 px-4 border-2">Correo</th>
                            <th class="py-2 px-4 border-2">Tipo de usuario</th>
                            <th class="py-2 px-4 border-2">Opciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @if (isset($usuarios))
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <td class="py-2 px-4">{{ $usuario->nombre }}</td>
                                    <td class="py-2 px-4">{{ $usuario->correo }}</td>
                                    <td class="py-2 px-4">{{ $usuario->tipoUsuario }}</td>
                                    <td class="py-2 px-4 flex flex-row justify-center">
                                        <a href="/modificar/{{ $usuario->id }}">
                                            <img src="img/editar.png" height="18" width="18"> 
                                        </a>
                                        <form action="{{ route('usuarios.eliminar', $usuario->id) }}" 
                                            method="POST" class="flex flex-row justify-center w-20 ml-3">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirmDelete()">
                                                <img src="img/eliminar2.png" height="18" width="16">
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
    </div>
</body>
<script>
    function confirmDelete() {
        return confirm('¿Estás seguro de que deseas eliminar al usuario?');
    }
</script>
</html>
