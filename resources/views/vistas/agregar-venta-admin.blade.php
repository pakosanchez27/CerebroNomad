@extends('layouts.app')

@section('titulo')
    Nueva Venta
@endsection

@section('contenido')

    <div class="container">
        <h2 class="section-title">Información del paciente</h2>
        <div class="grid">
            <input type="text" placeholder="Nombre" class="input" id="nombrePaciente" value="{{ $paciente->name }}" readonly>
            <input type="text" placeholder="Apellido paterno" class="input" id="apellidoPaterno" value="{{ $paciente->apellido_paterno }}" readonly>
            <input type="text" placeholder="Apellido materno" class="input" id="apellidoMaterno" value="{{ $paciente->apellido_materno }}" readonly>
            <input type="email" placeholder="Correo electrónico" class="input" id="correoPaciente" value="{{ $paciente->email }}" readonly>
            <input type="tel" placeholder="Teléfono" class="input" id="telefonoPaciente" value="{{ $paciente->telefono }}" readonly>
            <div class="select-container">
                <select class="select" id="aseguradoraPaciente" disabled>
                    <option disabled>Aseguradora</option>
                    @foreach ($aseguradora as $Aseguradora)
                        <option value="{{ $aseguradora->id }}" {{ $aseguradora->id == $paciente->aseguradora_id ? 'selected' : '' }}>
                            {{ $aseguradora->name }}
                        </option>
                    @endforeach
                </select>
                <svg class="icon">
                    <path d="m6 9 6 6 6-6"></path>
                </svg>
            </div>
        </div>
        <h2 class="section-title">Información de venta</h2>
        <div class="grid">
            <div class="select-container">
                <select class="select" id="seller">
                    <option disabled selected>Vendedor</option>
                    @foreach ($vendedores as $vendedor)
                        <option value="{{ $vendedor->id }}">{{ $vendedor->name }}</option>
                    @endforeach
                </select>
                <svg class="icon">
                    <path d="m6 9 6 6 6-6"></path>
                </svg>
            </div>
            <div class="select-container">
                <select class="select" id="payment-method">
                    <option disabled selected>Método de pago</option>
                    <option value="efectivo">Efectivo</option>
                    <option value="TDC">Tarjeta de Crédito</option>
                    <option value="TDD">Tarjeta de Débito</option>
                    <option value="aseguradora">Aseguradora</option>
                </select>
                <svg class="icon">
                    <path d="m6 9 6 6 6-6"></path>
                </svg>
            </div>
            <div class="col-span-1 md:col-span-2">
                <div class="flex items-center mb-4">
                    <select id="testSelect" class="input flex-1 mr-4">
                        <option disabled selected>--Selecciona una prueba--</option>
                        @foreach ($pruebas as $prueba)
                            <option value="{{ $prueba->id }}" data-precio="{{ $prueba->price }}">
                                {{ $prueba->name }}
                            </option>
                        @endforeach
                    </select>
                    <button class="button" onclick="handleAddTest()">Agregar</button>
                </div>
                <div class="border-t pt-4">
                    <div id="testHeader" class="flex justify-between mb-6" style="display: none;">
                        <span class="text-primary font-semibold">Prueba</span>
                        <span class="text-primary font-semibold">Precio</span>
                        <span class="text-primary font-semibold">Editar</span>
                    </div>
                    <div id="testsContainer"></div>
                </div>
            </div>
        </div>
        <div class="border-t pt-6">
            <div id="addedTestsContainer" class="mb-6"></div>
            <div class="flex justify-between mb-6">
                <span class="text-primary font-semibold">Subtotal</span>
                <span id="subtotal" class="text-black font-semibold">0</span>
            </div>
            <div class="flex justify-between mb-6">
                <span class="text-primary font-semibold">IVA 16%</span>
                <span id="iva" class="text-black font-semibold">0</span>
            </div>
            <div class="flex justify-between mb-6 font-semibold">
                <span class="text-primary font-semibold">Total</span>
                <span id="total" class="text-black font-semibold">0</span>
            </div>
            <button class="button full-width" onclick="handleSubmit()">Registrar venta</button>
        </div>
    </div>

    <form id="ventaForm" action="{{ route('venta.store', $paciente->id) }}" method="POST">
        @csrf
        <input type="hidden" name="nombre" id="hiddenNombre" value="{{ $paciente->name }}">
        <input type="hidden" name="apellido_paterno" id="hiddenApellidoPaterno" value="{{ $paciente->apellido_paterno }}">
        <input type="hidden" name="apellido_materno" id="hiddenApellidoMaterno" value="{{ $paciente->apellido_materno }}">
        <input type="hidden" name="correo" id="hiddenCorreo" value="{{ $paciente->email }}">
        <input type="hidden" name="telefono" id="hiddenTelefono" value="{{ $paciente->telefono }}">
        <input type="hidden" name="aseguradora" id="hiddenAseguradora" value="{{ $paciente->aseguradora_id }}">
        <input type="hidden" name="vendedor" id="hiddenVendedor">
        <input type="hidden" name="metodo_pago" id="hiddenMetodoPago">
        <input type="hidden" name="subtotal" id="hiddenSubtotal">
        <input type="hidden" name="iva" id="hiddenIva">
        <input type="hidden" name="total" id="hiddenTotal">
        <input type="hidden" name="pruebas" id="hiddenPruebas">
        <button type="submit" style="display: none;"></button>
    </form>

    <script>
        let tests = []

        function handleAddTest() {
            const testSelect = document.getElementById('testSelect')
            const selectedOption = testSelect.options[testSelect.selectedIndex]

            if (selectedOption.value !== "") {
                const testName = selectedOption.text
                const testPrice = parseFloat(selectedOption.getAttribute('data-precio'))

                tests.push({ name: testName, price: testPrice })
                renderTests()
                updateTotals()
            }
        }

        function handleRemoveTest(index) {
            tests.splice(index, 1)
            renderTests()
            updateTotals()
        }

        function renderTests() {
            const container = document.getElementById('testsContainer')
            const addedTestsContainer = document.getElementById('addedTestsContainer')
            const testHeader = document.getElementById('testHeader')
            
            if (tests.length > 0) {
                testHeader.style.display = 'flex'
            } else {
                testHeader.style.display = 'none'
            }
            
            container.innerHTML = tests.map((test, index) => `
                <div class="test-row" key="${index}">
                    <span class="text-primary">${test.name}</span>
                    <span class="text-primary">${test.price.toFixed(2)}</span>
                    <button class="button delete" onclick="handleRemoveTest(${index})">Editar</button>
                </div>
            `).join('')

            addedTestsContainer.innerHTML = tests.map((test, index) => `
                <div class="flex justify-between mb-4" key="${index}">
                    <span class="text-primary">${test.name}</span>
                    <span class="text-primary">${test.price.toFixed(2)}</span>
                </div>
            `).join('')
        }

        function updateTotals() {
            let subtotal = tests.reduce((sum, test) => sum + test.price, 0)
            let iva = subtotal * 0.16
            let total = subtotal + iva

            document.getElementById('subtotal').textContent = subtotal.toFixed(2)
            document.getElementById('iva').textContent = iva.toFixed(2)
            document.getElementById('total').textContent = total.toFixed(2)
        }

        function handleSubmit() {
            document.getElementById('hiddenVendedor').value = document.getElementById('seller').value
            document.getElementById('hiddenMetodoPago').value = document.getElementById('payment-method').value
            document.getElementById('hiddenSubtotal').value = document.getElementById('subtotal').textContent
            document.getElementById('hiddenIva').value = document.getElementById('iva').textContent
            document.getElementById('hiddenTotal').value = document.getElementById('total').textContent
            document.getElementById('hiddenPruebas').value = JSON.stringify(tests.map(test => test.name))

            document.getElementById('ventaForm').submit()
        }
    </script>
@endsection

