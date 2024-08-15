<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Detalles de la Cita</title>
    <style>
        .scrollable-content {
            overflow-y: auto;
            height: 100%;
        }
    </style>
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
            <div class="bg-[#94B6E4] bg-opacity-50 p-8 md:p-10 rounded-lg shadow-xl w-full max-w-3xl">
                <h2 class="text-3xl font-bold text-center mb-4">Detalles de la cita</h2>
                <form action="{{ route('actualizarCita', ['id' => $cita->id]) }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-2">
                            <label class="block font-medium">Servicio</label>
                            <input type="text" name="motivos"
                                value="{{ $cita->tipo_servicio ? $cita->tipo_servicio->nombre : 'N/A' }}"
                                placeholder="Motivo de la cita" 
                                class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="mb-2">
                            <label class="block font-medium">Motivo de la cita</label>
                            <input type="text" name="motivos" 
                                value="{{ $cita->motivos }}"
                                placeholder="Motivo de la cita" 
                                class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="mb-2">
                            <label class="block font-medium">Fecha de la cita</label>
                            <input type="date" name="fecha" 
                                value="{{ $cita->fecha->format('Y-m-d') }}"
                                class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="mb-2">
                            <label class="block font-medium">Hora de la cita</label>
                            <input type="time" name="hora" 
                                value="{{ date('H:i', strtotime($cita->hora)) }}"
                                class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="mb-2">
                            <label class="block font-medium">Temperatura</label>
                            <input type="text" name="temperatura" 
                                value="{{ $cita->temperatura }}"
                                placeholder="Temperatura" 
                                class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="mb-2">
                            <label class="block font-medium">Presión arterial</label>
                            <input type="text" name="presion_arterial" 
                                value="{{ $cita->presion_arterial }}"
                                placeholder="Presión arterial" 
                                class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div class="col-span-2 mb-2">
                            <label class="block font-medium">Diagnóstico</label>
                            <textarea name="diagnostico" 
                                placeholder="Diagnóstico" 
                                class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                {{ $cita->diagnostico }}
                            </textarea>
                        </div>
                        <div class="col-span-2 grid grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label class="block font-medium">Medicamentos recetados</label>
                                <div id="medicationFields" class="space-y-2">
                                    @foreach (explode(',', $cita->medicamentos) as $medicamento)
                                        <div class="flex items-center">
                                            <input type="text" name="medicamentos[]" value="{{ $medicamento }}"
                                                placeholder="Medicamento" 
                                                class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                            <button type="button" onclick="removeField(this)"
                                                class="ml-2 text-2xl font-bold">-</button>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="button" class="hover:text-white" onclick="addMedicationField()" class="mt-2">
                                    Añadir +
                                </button>
                            </div>
                            <div class="mb-2">
                                <label class="block font-medium">Estudios a realizar</label>
                                <div id="estudiosFields" class="space-y-2">
                                    @foreach (explode(',', $cita->estudios) as $estudio)
                                        <div class="flex items-center">
                                            <input type="text" name="estudios[]" value="{{ $estudio }}"
                                                placeholder="Estudio" 
                                                class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                            <button type="button" onclick="removeField(this)"
                                                class="ml-2 text-2xl font-bold ">
                                                -
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="button" class="hover:text-white" onclick="addEstudioField()" class="mt-2">
                                    Añadir +
                                </button>
                            </div>
                        </div>
                        <div class="col-span-2 grid grid-cols-2 gap-4">
                            <div class="col-span-2">
                                <label class="block font-medium">Productos</label>
                                <div id="productFields" class="space-y-2">
                                    @php
                                        $productosData = json_decode($cita->productos, true) ?? [];
                                    @endphp
                                    @foreach ($productosData as $producto)
                                        <div class="flex items-center">
                                            <select name="productos[]"
                                                class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                                onchange="updateTotal(this)">
                                                <option value="">Selecciona un producto</option>
                                                @foreach ($productos as $item)
                                                    <option value="{{ $item->id }}"
                                                        data-stock="{{ $item->stock }}"
                                                        data-precio="{{ $item->costo }}"
                                                        {{ $producto['id'] == $item->id ? 'selected' : '' }}>
                                                        {{ $item->nombre }} - ${{ $item->costo }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <input type="number" name="cantidades[]"
                                                value="{{ $producto['cantidad'] }}" placeholder="Cantidad"
                                                class="mt-1 block w-full px-3 py-2 bg-transparent border-black border-2 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" 
                                                min="1"
                                                onchange="validateQuantity(this)">
                                        </div>
                                    @endforeach
                                </div>
                                <button type="button" class="hover:text-white" onclick="addProductField()" class="mt-2">
                                    Añadir +
                                </button>
                            </div>

                            <div class="mb-2">
                                <label class="block font-medium">Precio del servicio</label>
                                <input type="text" id="servicePrice"
                                    value="{{ $servicio ? $servicio->precio : 0 }}"
                                    class="w-full px-4 py-2 border rounded-md" readonly>
                            </div>
                            <div class="mb-2">
                                <label class="block font-medium">Total</label>
                                <input type="text" id="total" name="total" value="{{ $cita->total }}"
                                    class="w-full px-4 py-2 border rounded-md" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-row justify-center mt-6">
                        <button type="submit"
                            class="w-2/3 flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function addMedicationField() {
            var container = document.getElementById('medicationFields');
            var div = document.createElement('div');
            div.className = 'flex items-center mt-2';
            var input = document.createElement('input');
            input.type = 'text';
            input.name = 'medicamentos[]';
            input.placeholder = 'Medicamento';
            input.className = 'w-full px-4 py-2 border rounded-md';
            var button = document.createElement('button');
            button.type = 'button';
            button.className = 'ml-2 text-2xl font-bold text-blue-800';
            button.textContent = '-';
            button.onclick = function() {
                removeField(button);
            };
            div.appendChild(input);
            div.appendChild(button);
            container.appendChild(div);
        }

        function addEstudioField() {
            var container = document.getElementById('estudiosFields');
            var div = document.createElement('div');
            div.className = 'flex items-center mt-2';
            var input = document.createElement('input');
            input.type = 'text';
            input.name = 'estudios[]';
            input.placeholder = 'Estudio';
            input.className = 'w-full px-4 py-2 border rounded-md';
            var button = document.createElement('button');
            button.type = 'button';
            button.className = 'ml-2 text-2xl font-bold text-blue-800';
            button.textContent = '-';
            button.onclick = function() {
                removeField(button);
            };
            div.appendChild(input);
            div.appendChild(button);
            container.appendChild(div);
        }

        function addProductField() {
            var container = document.getElementById('productFields');
            var div = document.createElement('div');
            div.className = 'flex items-center mt-2';

            var select = document.createElement('select');
            select.name = 'productos[]';
            select.className = 'w-full px-4 py-2 border rounded-md';
            select.setAttribute('onchange', 'updateTotal(this)');
            var option = document.createElement('option');
            option.value = '';
            option.text = 'Selecciona un producto';
            select.appendChild(option);

            @foreach ($productos as $producto)
                var option = document.createElement('option');
                option.value = '{{ $producto->id }}';
                option.text = '{{ $producto->nombre }} - {{ $producto->costo }}';
                option.setAttribute('data-stock', '{{ $producto->stock }}');
                select.appendChild(option);
            @endforeach

            var input = document.createElement('input');
            input.type = 'number';
            input.name = 'cantidades[]';
            input.placeholder = 'Cantidad';
            input.className = 'w-full px-4 py-2 border rounded-md';
            input.setAttribute('onchange', 'validateQuantity(this)');

            div.appendChild(select);
            div.appendChild(input);
            container.appendChild(div);
        }

        function removeField(button) {
            const field = button.parentNode;
            field.parentNode.removeChild(field);
        }

        function updateQuantityOptions(select) {
            const selectedOption = select.options[select.selectedIndex];
            const stock = selectedOption.getAttribute('data-stock');
            const quantityInput = select.nextElementSibling;

            quantityInput.setAttribute('max', stock);
            quantityInput.setAttribute('min', 1);
            quantityInput.value = 1;

            updateTotal();
        }

        function validateQuantity(input) {
            const max = input.getAttribute('max');
            const min = input.getAttribute('min');
            if (parseInt(input.value) > parseInt(max)) {
                input.value = max;
            } else if (parseInt(input.value) < parseInt(min)) {
                input.value = min;
            }
            updateTotal();
        }

        function updateTotal() {
        var servicePrice = parseFloat(document.getElementById('servicePrice').value) || 0;
        var total = servicePrice;

        var productFields = document.getElementById('productFields');
        var productSelects = productFields.querySelectorAll('select[name="productos[]"]');
        var productQuantities = productFields.querySelectorAll('input[name="cantidades[]"]');

        productSelects.forEach(function(select, index) {
            var selectedOption = select.options[select.selectedIndex];
            var productPrice = parseFloat(selectedOption.getAttribute('data-precio')) || 0;
            var quantity = parseFloat(productQuantities[index].value) || 0;
            total += productPrice * quantity;
        });

        document.getElementById('total').value = total.toFixed(2);
    }

    document.addEventListener('DOMContentLoaded', function() {
        updateTotal();
        document.querySelectorAll('input[name="cantidades[]"], select[name="productos[]"]').forEach(function(element) {
            element.addEventListener('input', updateTotal);
            element.addEventListener('change', updateTotal);
        });
    });
    </script>
</body>

</html>