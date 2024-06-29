@extends('layouts.app')

@section('titulo')
    Ventas - agregar
@endsection

@section('contenido')
    <div class="p-5">
        <div class=" container d-flex p-3 text-poppins">
            <h2 class="text-secondary">Venta/<span class="text-black">#{{ $Order }}</span></h2>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="card p-3">
                        <div class="row ">
                            <p class="fw-bold p-3">
                                Datos del paciente
                            </p>
                        </div>
                        <div class="row d-flex flex-column gap-4">
                            <div class="col-12 mb-3">
                                <p class="fw-bold">No. Paciente: <span class="fw-normal">{{ $paciente->id }}</span></p>
                            </div>
                            <div class="col-6">
                                <p class="fw-bold">Nombre: <span class="fw-normal">{{ $paciente->name }}
                                        {{ $paciente->apellido_paterno }} {{ $paciente->apellido_materno }}</span></p>
                            </div>
                            <div class="col-6">
                                <p class="fw-bold">Sexo: <span class="fw-normal">{{ $paciente->sexo }}</span></p>
                            </div>
                            <div class="col-6">
                                <p class="fw-bold">Fecha De Nacimiento: <span
                                        class="fw-normal">{{ $paciente->fecha_nacimiento }}</span></p>
                            </div>
                            <div class="col-6">
                                <p class="fw-bold">Edad: <span
                                        class="fw-normal">{{ \Carbon\Carbon::parse($paciente->fecha_nacimiento)->age }}
                                        años</span></p>
                            </div>
                            <div class="col-6">
                                <p class="fw-bold">Telefono: <span class="fw-normal">{{ $paciente->telefono }}</span></p>
                            </div>
                            <div class="col-6">
                                <p class="fw-bold">Email: <span class="fw-normal">{{ $paciente->email }}</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card p-3">
                        <div class="row d-flex flex-column gap-4">
                            <p class="fw-bold p-3">
                                Datos de la Venta
                            </p>
                            <div class="col-12">
                                <p class="fw-bold">No.Venta: <span class="fw-normal">#{{ $Order }}</span></p>
                            </div>
                            <div class="col-12">
                                <p class="fw-bold">Fecha: <span class="fw-normal">@php echo date('d/m/Y'); @endphp</span></p>
                            </div>
                            <div class="col-12">
                                <p class="fw-bold">Importe: <span class="fw-normal subtotal" id="subtotal">0.00</span></p>
                            </div>
                            <div class="col-12">
                                <p class="fw-bold">IVA: <span class="fw-normal" id="iva">0.00</span></p>
                            </div>
                            <div class="col-12">
                                <p class="fw-bold">Total: <span class="fw-normal total" id="total">0.00</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{ route('venta.store', $paciente->id) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-8">
                        <div class="card p-3 mt-5">
                            <div class="row d-flex justify-content-between align-items-center p-3">
                                <p class="col-12 fw-bold">Datos del vendedor</p>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    @if ($rol === 'admin')
                                        <select name="vendedor" id="vendedor" class="form-select form-control-lg">
                                            <option selected disabled>--Selecciona--</option>
                                            @foreach ($vendedores as $vendedor)
                                                <option value="{{ $vendedor->id }}">{{ $vendedor->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('vendedor')
                                            <div class=" text-danger " role="alert">
                                                {{ $errors->first('vendedor') }}
                                            </div>
                                        @enderror
                                    @else
                                        <div class="mb-3">
                                            <div class="col-12">
                                                <p class="fw-bold">ID Empleado: <span
                                                        class="fw-normal">{{ $user->id }}</span></p>
                                                <p class="fw-bold">Nombre: <span class="fw-normal">{{ $user->name }}
                                                        {{ $user->apellido_paterno }}</span>
                                                </p>
                                                <input type="hidden" name="vendedor" value="{{ $user->id }}">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row d-flex justify-content-between align-items-center p-3">
                                <p class="col-12 fw-bold">Datos del Doctor</p>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <select name="doctor" id="doctor" class="form-select form-control-lg">
                                        <option selected disabled>--Selecciona--</option>
                                        @foreach ($doctores as $doctor)
                                            <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                        @endforeach
                                        <option value="">Ninguno</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-between align-items-center p-3">
                                <p class="col-12 fw-bold">Método de pago</p>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <select name="metodo_pago" id="metodo_pago" class="form-select form-select-lg mb-3"
                                        aria-label="Large select example">
                                        <option disabled selected>--Selecciona--</option>
                                        <option value="efectivo">Efectivo</option>
                                        <option value="TDC">Tarjeta de Crédito</option>
                                        <option value="TDD">Tarjeta de Débito</option>
                                        <option value="aseguradora">Aseguradora</option>
                                    </select>
                                    @error('metodo_pago')
                                        <div class=" text-danger " role="alert">
                                            {{ $errors->first('metodo_pago') }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row d-flex justify-content-between align-items-center p-3">
                                <p class="col-12 fw-bold">Lugar de Toma de Muestras</p>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <select name="lugar_toma" id="lugar_toma" class="form-select form-select-lg mb-3"
                                        aria-label="Large select example">
                                        <option disabled selected>--Selecciona--</option>
                                        <option value="Laboratorio">Laboratorio</option>
                                        <option value="Hospital">Hospital</option>
                                        <option value="Domicilio">Domicilio</option>
                                    </select>
                                    @error('lugar_toma')
                                        <div class=" text-danger " role="alert">
                                            El lugar de toma de muestra es obligatorio.
                                        </div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="card p-3 mt-5">
                            <div class="d-flex justify-content-between align-items-center p-3">
                                <p class="fw-bold">Estudios</p>
                                <div class=" d-flex align-items-center gap-3">
                                    <select name="prueba" id="prueba" class="form-select form-select-lg mb-3 "
                                        aria-label="Large select example">
                                        <option disabled selected>--Selecciona una prueba--</option>
                                        @foreach ($pruebas as $prueba)
                                            <option value="{{ $prueba->id }}" data-precio="{{ $prueba->price }}">
                                                {{ $prueba->name }}</option>
                                        @endforeach
                                    </select>
                                    <a id="agregarPrueba" class="btn btn-primary">Agregar</a>
                                </div>
                            </div>
                            <div class="">
                                @error('pruebas')
                                    <div class=" text-danger " role="alert">
                                        Almenos selecciona una prueba
                                    </div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col">
                                    <table class="table table-bordered table-pruebas">
                                        <thead>
                                            <tr>
                                                <th>Estudio</th>
                                                <th class="text-center">Precio</th>
                                                <th class="text-center">Acciones</th>
                                            </tr>
                                        <tbody id="tablaPruebas">
                                            <!-- Las filas de pruebas se agregarán aquí dinámicamente -->
                                        </tbody>
                                        </thead>
                                    </table>
                                    <select name="pruebas[]" id="pruebasArray" multiple style="display: none;"></select>

                                    <!-- Agregar campo oculto para enviar el subtotal al controlador -->
                                    <input type="hidden" name="subtotal" id="subtotalInput">
                                    {{-- Total --}}
                                    <input type="hidden" name="total" id="totalInput">
                                </div>
                            </div>
                        </div>
                        <div class="card p-3 mt-5">
                            <button type="submit" class="btn btn-success">Registrar venta</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('agregarPrueba').addEventListener('click', function() {
                var pruebaSelect = document.getElementById('prueba');
                var pruebaId = pruebaSelect.value;
                var pruebaNombre = pruebaSelect.options[pruebaSelect.selectedIndex].text;
                var precio = parseFloat(pruebaSelect.options[pruebaSelect.selectedIndex].getAttribute(
                    'data-precio'));

                // Crear el botón de eliminar
                var btnEliminar = document.createElement('button');
                btnEliminar.textContent = 'x';
                btnEliminar.classList.add('btn', 'btn-danger', 'btn-sm');
                btnEliminar.addEventListener('click', function() {
                    var fila = this.closest(
                    'tr'); // Obtener la fila más cercana al botón de eliminar
                    var precioEliminar = parseFloat(fila.querySelector('td:nth-child(2)')
                        .textContent); // Obtener el precio a eliminar

                    // Remover la fila del DOM
                    fila.parentNode.removeChild(fila);

                    // Recalcular totales
                    calcularTotales();
                });

                // Crear la fila HTML para la tabla
                var fila = `
            <tr data-id="${pruebaId}">
                <td>${pruebaNombre}</td>
                <td class="text-center">${precio.toFixed(2)}</td>
                <td class="text-center"></td>
            </tr>
        `;

                // Agregar el botón de eliminar a la fila
                var temp = document.createElement('template');
                temp.innerHTML = fila.trim(); // Usar un template para poder manipular elementos

                var filaHTML = temp.content.firstChild; // Obtener el primer elemento del template
                var tdAcciones = filaHTML.querySelector('td:nth-child(3)');
                tdAcciones.appendChild(btnEliminar);

                // Agregar la fila a la tabla
                document.getElementById('tablaPruebas').appendChild(filaHTML);

                // Agregar el ID de la prueba al array de pruebas
                var pruebasArray = document.getElementById('pruebasArray');
                var option = document.createElement('option');
                option.value = pruebaId;
                option.selected = true; // Añadir la prueba seleccionada al array
                pruebasArray.appendChild(option);

                // Calcular subtotal, IVA y total
                calcularTotales();
            });

            // Función para calcular subtotal, IVA y total
            function calcularTotales() {
                var subtotal = 0;

                // Obtener todas las filas de la tabla
                var filas = document.querySelectorAll('#tablaPruebas tr');

                // Iterar sobre las filas y sumar los precios
                filas.forEach(function(fila) {
                    var precio = parseFloat(fila.querySelector('td:nth-child(2)').textContent);
                    subtotal += precio;
                });

                // Mostrar subtotal
                document.getElementById('subtotal').textContent = subtotal.toFixed(2);

                // Calcular IVA
                var iva = subtotal * 0.16;
                document.getElementById('iva').textContent = iva.toFixed(2);

                // Calcular total
                var total = subtotal + iva;
                document.getElementById('total').textContent = total.toFixed(2);

                // Actualizar los valores en los campos hidden para enviar al controlador
                document.getElementById('subtotalInput').value = subtotal.toFixed(2);
                document.getElementById('totalInput').value = total.toFixed(2);
            }
        });
    </script>
@endsection
