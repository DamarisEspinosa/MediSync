<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Registro Pacientes</title>
</head>

<body class="bg-gradient-to-r from-[#4CA9DF] to-[#292E91]">
    <div class="flex h-screen">
        <div class="bg-blue-650 text-white w-1/5 p-6 flex flex-col justify-between shadow-xl">
            <div>
                <div class="flex items-center mb-8">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo" class="w-8 h-8 mr-2">
                    <span class="text-2xl font-bold">Salud Conecta</span>
                </div>
                <ul>
                    <li class="flex items-center mb-10">
                        <img src="{{ asset('img/calendario.png') }}"  alt="Agenda Icon" class="w-6 h-6 mr-2">
                        <a href="/recepcionista" class="text-lg">Agenda</a>
                    </li>
                    <li class="flex items-center mb-10">
                        <img src="{{ asset('img/calendario.png') }}" alt="Agregar servicio Icon" class="w-6 h-6 mr-2">
                        <a href="/servicios" class="text-lg">Agregar servicio</a>
                    </li>
                    <li class="flex items-center mb-10">
                        <img src="{{ asset('img/calendario.png') }}" alt="Agregar paciente Icon" class="w-6 h-6 mr-2">
                        <a href="/registroPacientes" class="text-lg">Agregar paciente</a>
                    </li>
                    <li class="flex items-center mb-10">
                        <img src="{{ asset('img/calendario.png') }}" alt="Agregar paciente Icon" class="w-6 h-6 mr-2">
                        <a href="/registrarProducto" class="text-lg">Agregar producto</a>
                    </li>
                    <li class="flex items-center mb-10">
                        <img src="{{ asset('img/usuario.png') }}" alt="Ver pacientes Icon" class="w-6 h-6 mr-2">
                        <a href="/verServicios" class="text-lg">Ver servicios</a>
                    </li>
                    <li class="flex items-center mb-10">
                        <img src="{{ asset('img/usuario.png') }}" alt="Ver pacientes Icon" class="w-6 h-6 mr-2">
                        <a href="/verPacientes" class="text-lg">Ver pacientes</a>
                    </li>
                    <li class="flex items-center mb-10">
                        <img src="{{ asset('img/usuario.png') }}" alt="Ver pacientes Icon" class="w-6 h-6 mr-2">
                        <a href="/Productos" class="text-lg">Ver productos</a>
                    </li>
                </ul>
            </div>
            <button
                class="w-full flex justify-center py-2 px-2 border border-transparent text-sm font-medium rounded-md text-white bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                onclick="location.href='/'">
                Cerrar sesión
            </button>
        </div>

        <div class="flex items-center justify-center w-3/4 ml-auto">
            <div class="bg-white bg-opacity-10 p-8 md:p-10 rounded-lg shadow-xl w-full max-w-md">
                <h2 class="text-3xl font-bold text-white text-center mb-6">Registro de pacientes</h2>
                <form action="{{ route('registrar-pacientes') }}" method="POST">
                    @csrf
                    <div class="mb-4 flex items-center bg-white bg-opacity-20 rounded-md shadow-sm">
                        <img src="img/user.png" alt="Nombre Icon" class="w-6 h-6 ml-2">
                        <input type="text" name="nombre" id="nombre"
                            class="flex-grow px-3 py-2 bg-transparent border-none rounded-md focus:outline-none focus:ring-0 text-white placeholder-white"
                            placeholder="Nombre(s)" required>
                    </div>
                    <div class="mb-4 flex items-center bg-white bg-opacity-20 rounded-md shadow-sm">
                        <img src="img/user.png" alt="Apellidos Icon" class="w-6 h-6 ml-2">
                        <input type="text" name="apellidos" id="apellidos"
                            class="flex-grow px-3 py-2 bg-transparent border-none rounded-md focus:outline-none focus:ring-0 text-white placeholder-white"
                            placeholder="Apellidos(s)" required>
                    </div>
                    <div class="mb-4 flex items-center bg-white bg-opacity-20 rounded-md shadow-sm">
                        <img src="img/pill.png" alt="pill Icon" class="w-6 h-6 ml-2">
                        <input type="text" name="enfermedades" id="enfermedades"
                            class="flex-grow px-3 py-2 bg-transparent border-none rounded-md focus:outline-none focus:ring-0 text-white placeholder-white"
                            placeholder="Enfermedades que padece" required>
                    </div>
                    <div class="mb-4 flex items-center bg-white bg-opacity-20 rounded-md shadow-sm">
                        <img src="img/pill.png" alt="pill Icon" class="w-6 h-6 ml-2">
                        <input type="text" name="alergias" id="alergias"
                            class="flex-grow px-3 py-2 bg-transparent border-none rounded-md focus:outline-none focus:ring-0 text-white placeholder-white"
                            placeholder="Alergias" required>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-4 flex items-center bg-white bg-opacity-20 rounded-md shadow-sm">
                            <img src="img/user.png" alt="user Icon" class="w-6 h-6 ml-2">
                            <input type="text" name="altura" id="altura"
                                class="flex-grow px-3 py-2 bg-transparent border-none rounded-md focus:outline-none focus:ring-0 text-white placeholder-white"
                                placeholder="Altura" required>
                        </div>
                        <div class="mb-4 flex items-center bg-white bg-opacity-20 rounded-md shadow-sm">
                            <img src="img/user.png" alt="user Icon" class="w-6 h-6 ml-2">
                            <input type="text" name="peso" id="peso"
                                class="flex-grow px-3 py-2 bg-transparent border-none rounded-md focus:outline-none focus:ring-0 text-white placeholder-white"
                                placeholder="Peso" required>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-4 flex items-center bg-white bg-opacity-20 rounded-md shadow-sm">
                            <img src="img/user.png" alt="user Icon" class="w-6 h-6 ml-2">
                            <input type="number" name="edad" id="edad"
                                class="flex-grow px-1 py-2 bg-transparent border-none rounded-md focus:outline-none focus:ring-0 text-white placeholder-white"
                                placeholder="Edad" required>
                        </div>
                        <div class="mb-4 flex items-center bg-white bg-opacity-20 rounded-md shadow-sm">
                            <img src="img/user.png" alt="user Icon" class="w-6 h-6 ml-2">
                            <select name="genero" id="genero"
                                class="flex-grow px-3 py-2 bg-transparent border-none rounded-md focus:outline-none focus:ring-0 text-white placeholder-white">
                                <option value="">Genero</option>
                                <option value="masculino">Masculino</option>
                                <option value="femenino">Femenino</option>
                                <option value="prefiero-no-especificar">Prefiero no especificar</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-4 flex items-center bg-white bg-opacity-20 rounded-md shadow-sm">
                        <img src="img/email.png" alt="Correo Icon" class="w-6 h-6 ml-2">
                        <input type="email" name="correo" id="correo"
                            class="flex-grow px-3 py-2 bg-transparent border-none rounded-md focus:outline-none focus:ring-0 text-white placeholder-white"
                            placeholder="Correo" required>
                    </div>
                    <div class="mb-4 flex items-center bg-white bg-opacity-20 rounded-md shadow-sm">
                        <img src="img/candado.png" alt="Correo Icon" class="w-6 h-6 ml-2">
                        <input type="password" name="password" id="password"
                            class="flex-grow px-3 py-2 bg-transparent border-none rounded-md focus:outline-none focus:ring-0 text-white placeholder-white"
                            placeholder="Contraseña" required>
                    </div>
                    <div class="mb-4 flex items-center bg-white bg-opacity-20 rounded-md shadow-sm">
                        <img src="img/phone.png" alt="Teléfono Icon" class="w-6 h-6 ml-2">
                        <input type="tel" name="telefono" id="telefono"
                            class="flex-grow px-3 py-2 bg-transparent border-none rounded-md focus:outline-none focus:ring-0 text-white placeholder-white"
                            placeholder="Número de teléfono" required>
                    </div>
                    <div class="flex-grow flex items-center justify-center mt-6">
                        <button type="submit"
                            class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Registrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
