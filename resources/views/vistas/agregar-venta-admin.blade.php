@extends('layouts.app')

@section('titulo')
    Ventas - agregar
@endsection

@section('contenido')
    <div class="contenido-roles__texto text-center text-md-start p-5">
        <h2>Nueva Venta</h2>
        <p>Este formulario es exclusivo del administrado y el editor, es con el fin de registrar ventas extraordinariamente.
        </p>
    </div>

    <div class="contenedor-venta p-5">
        <div class="">
            <h2 class="mb-5">Datos del Paciente</h2>

            <fieldset disabled="disabled">

                <div class="row w-100 w-md-75 mb-3">
                    <div class="col-12 col-lg">
                        <input type="text" class="form-control" value="{{ $paciente->name }}">
                        <label class="form-label">Apellido Materno</label>
                    </div>
                    <div class="col-12 col-lg">
                        <input type="text" class="form-control" value="{{ $paciente->apellido_paterno }}">
                        <label class="form-label">Apellido Paterno</label>
                    </div>
                    <div class="col-12 col-lg">
                        <input type="text" class="form-control" value="{{ $paciente->apellido_materno }}">
                        <label class="form-label">Apellido Materno</label>
                    </div>
                </div>

                <div class="row w-100 w-md-75 mb-3">
                    <div class="col-12 col-lg">
                        <input type="text" class="form-control" value="{{ $paciente->email }}">
                        <label class="form-label">Email</label>
                    </div>
                    <div class="col-12 col-lg">
                        <input type="text" class="form-control" value="{{ $paciente->telefono }}">
                        <label class="form-label">Telefono</label>
                    </div>
                    <div class="col-12 col-lg">
                        <input type="text" class="form-control" value="{{ $aseguradora->name }}">
                        <label class="form-label">Aseguradora</label>
                    </div>
                </div>

            </fieldset>
        </div>
        <div class="">
            <h2 class="mb-5">Datos de la venta</h2>

            <form action="{{ route('venta.store', $paciente->id) }}" method="POST">
                @csrf

                <fieldset>
                    <div class="mb-3">
                        <label class="form-label">Vendedor</label>
                        <select name="vendedor" id="vendedor" class="form-select form-select-lg mb-3 w-25 "
                            aria-label="Large select example">">
                            <option disabled selected>--Selecciona un vendedor--</option>
                            @foreach ($vendedores as $vendedor)
                                <option value="{{ $vendedor->id }}">{{ $vendedor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Método de Pago</label>
                        <select name="metodo_pago" id="metodo_pago" class="form-select form-select-lg mb-3 w-25" aria-label="Large select example">
                            <option disabled selected>--Selecciona un método de pago--</option>
                            <option value="efectivo">Efectivo</option>
                            <option value="TDC">Tarjeta de Crédito</option>
                            <option value="TDD">Tarjeta de Débito</option>
                            <option value="aseguradora">Aseguradora</option>
                        </select>
                    </div>
                    <div class="mb-3 w-50 ">
                        <label class="form-label">Pruebas</label>
                        <div class="input-group d-flex  align-items-center gap-3 ">
                            <select name="" id="prueba" class="form-select form-select-lg mb-3 w-25"
                                aria-label="Large select example">
                                <option disabled selected>--Selecciona una prueba--</option>
                                @foreach ($pruebas as $prueba)
                                    <option value="{{ $prueba->id }}" data-precio="{{ $prueba->price }}">
                                        {{ $prueba->name }}</option>
                                @endforeach
                            </select>
                            <a id="agregarPrueba" class="btn btn-primary ">Agregar</a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Prueba</th>
                                    <th>Precio</th>
                                </tr>
                            </thead>
                            <tbody id="tablaPruebas">
                                <!-- Aquí se agregarán las pruebas seleccionadas -->
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><strong>Subtotal</strong></td>
                                    <td id="subtotal" class="text-success">0</td>
                                </tr>
                                <tr>
                                    <td><strong>IVA 16%</strong></td>
                                    <td id="iva" class="text-success">0</td>
                                </tr>
                                <tr>
                                    <td><strong>Total</strong></td>
                                    <td id="total" class="text-primary">0</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    
                    <select name="pruebas[]" id="pruebasArray" multiple style="display: none;"></select>


                    <!-- Agregar campo oculto para enviar el subtotal al controlador -->
                    <input type="hidden" name="subtotal" id="subtotalInput">
                    {{-- Total --}}
                    <input type="hidden" name="total" id="totalInput">

                </fieldset>

                <button type="submit" class="btn btn-success">Registrar venta</button>
            </form>
            <script>
                document.getElementById('agregarPrueba').addEventListener('click', function() {
                    var pruebaSelect = document.getElementById('prueba');
                    var pruebaId = pruebaSelect.value;
                    var pruebaNombre = pruebaSelect.options[pruebaSelect.selectedIndex].text;
                    var precio = parseFloat(pruebaSelect.options[pruebaSelect.selectedIndex].getAttribute('data-precio'));
            
                    // Agregar la prueba a la tabla
                    var fila = `<tr><td>${pruebaNombre}</td><td>${precio}</td></tr>`;
                    document.getElementById('tablaPruebas').innerHTML += fila;
            
                    // Calcular subtotal
                    var subtotal = parseFloat(document.getElementById('subtotal').textContent);
                    subtotal += parseFloat(precio);
                    document.getElementById('subtotal').textContent = subtotal.toFixed(2);
            
                    // Calcular IVA
                    var iva = subtotal * 0.16;
                    document.getElementById('iva').textContent = iva.toFixed(2);
            
                    // Calcular total
                    var total = subtotal + iva;
                    document.getElementById('total').textContent = total.toFixed(2);
            
                    // Agregar el ID de la prueba al array de pruebas
                    var pruebasArray = document.getElementById('pruebasArray');
                    var option = document.createElement('option');
                    option.value = pruebaId;
                    option.selected = true; // Añadir la prueba seleccionada al array
                    pruebasArray.appendChild(option);
            
                    // Actualizar el valor del campo oculto subtotal
                    document.getElementById('subtotalInput').value = subtotal.toFixed(2);
                    document.getElementById('totalInput').value = total.toFixed(2);
                });
            </script>
            
            
            
        @endsection
