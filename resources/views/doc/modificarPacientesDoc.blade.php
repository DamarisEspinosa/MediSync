<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Modificar Pacientes</title>
</head>

<body class="bg-[#EBEBE9]">
    <header class="flex justify-between items-center bg-opacity-75 bg-[#94B6E4]" style="height: 70px;">
        <div class=" flex flex-row items-center" style="padding: 10px 20px;">
            <img src="../img/logo-login.png" width="50" height="50"> 
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
                <img src="../img/cerrar-sesion.png" class="mr-2" height="25" width="25">
                Cerrar sesión
            </a>
        </div>
    </header>

        <div class="flex items-center justify-center mt-5 mb-5">
            <div class="bg-[#94B6E4] bg-opacity-50 p-8 md:p-10 rounded-lg shadow-xl w-full max-w-md">
                <h2 class="text-3xl font-bold text-center mb-6">Modificar pacientes</h2>
                <form action="{{ route('pacientesDoc.update', $paciente->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" value="{{ $paciente->nombre }}" 
                            class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            placeholder="Nombre(s)" required>
                    </div>
                    <div class="mb-4">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" name="apellidos" id="apellidos" value="{{ $paciente->apellidos}}" 
                            class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            placeholder="Apellidos(s)" required>
                    </div>
                    <div class="mb-4">
                        <label for="enfermedades">Enfermedades</label>
                        <input type="text" name="enfermedades" id="enfermedades" value="{{ $paciente->enfermedades}}" 
                            class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            placeholder="Enfermedades que padece" required>
                    </div>
                    <div class="mb-4">
                        <label for="alergias">Alergias</label>
                        <input type="text" name="alergias" id="alergias" value="{{ $paciente->alergias}}" 
                            class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            placeholder="Alergias" required>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label for="altura">Altura</label>
                            <input type="text" name="altura" id="altura" value="{{ $paciente->altura}}" 
                                class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                placeholder="Altura" required>
                        </div>
                        <div class="mb-4">
                            <label for="peso">Peso</label>
                            <input type="text" name="peso" id="peso" value="{{ $paciente->peso}}" 
                                class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                placeholder="Peso" required>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label for="edad">Edad</label>
                            <input type="number" name="edad" id="edad" value="{{ $paciente->edad}}"
                                class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                placeholder="Edad" required>
                        </div>
                        <div class="mb-4">
                            <label for="genero">Género</label>
                            <select name="genero" id="genero" value="{{ $paciente->genero}}" 
                                class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                <option value="">Genero</option>
                                <option value="masculino">Masculino</option>
                                <option value="femenino">Femenino</option>
                                <option value="prefiero-no-especificar">Prefiero no especificar</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="correo">Correo</label>
                        <input type="email" name="correo" id="correo" value="{{ $paciente->correo}}" 
                            class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            placeholder="Correo" required>
                    </div>
                    <div class="mb-4">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" id="password" 
                            class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            placeholder="Contraseña" required>
                    </div>
                    <div class="mb-4">
                        <label for="telefono">Teléfono</label>
                        <input type="tel" name="telefono" id="telefono" value="{{ $paciente->telefono}}" 
                            class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            placeholder="Número de teléfono" required>
                    </div>
                    <div class="flex-grow flex items-center justify-center mt-6">
                        <button type="submit"
                            class="w-2/3 flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-full text-white bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Actualizar 
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>