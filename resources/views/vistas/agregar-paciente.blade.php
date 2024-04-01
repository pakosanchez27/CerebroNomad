@extends('layouts.app')

@section('titulo')
    Pacientes - agregar
@endsection

@section('contenido')
    <div class="agregar-paciente bg-secondary-subtle h-100 d-flex justify-content-center alince p-5   ">
        <div class=" agregar-paciente__contenedor bg-white  p-5 rounded-4 shadow ">
            <div class="contenido-roles__texto">
                <h2>Datos del Paciente</h2>
                <p>Ingresa los datos del paciente </p>
            </div>
            <form class="agregar-paciente__datosPersonales ">
                <h3 class="mb-4 h3">Nombre completo</h3>
                <div class="row">
                    <div class="mb-3 col-12 col-md-12 col-lg">
                        <input type="text" class="form-control mb-2" id="exampleFormControlInput1" placeholder="Juan"
                            name="name">
                        <label for="exampleFormControlInput1" class="form-label h4">Nombre</label>
                    </div>
                    <div class="mb-3 col-12 col-md-6 col-lg">
                        <input type="text" class="form-control mb-2" id="exampleFormControlInput1" placeholder="Perez"
                            name="apellido_paterno">
                        <label for="exampleFormControlInput1" class="form-label h4">Apellido Paterno</label>
                    </div>
                    <div class="mb-3 col-12 col-md-6 col-lg">
                        <input type="text" class="form-control mb-2" id="exampleFormControlInput1" placeholder="Perez"
                            name="apellido_materno">
                        <label for="exampleFormControlInput1" class="form-label h4">Apellido Materno</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <h3 class="mb-4 h3">Fecha nacimiento</h3>
                        <input class="form-control w-100 mb-4" type="date" name="fecha_nacimiento" id="fecha_nacimiento">
                    </div>
                    <div class="col-12 col-lg-6">
                        <h3 class="mb-4 h3">Tipo de Sangre</h3>
                        <select name="tipo_sangre" id="tipo_sangre" class="form-select form-select-lg ">
                            <option selected disabled>--Seleciona--</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                    </div>
                </div>

                <h3 class="mb-4 h3">Identificacion</h3>
                <div class="row">
                    <div class="mb-3 col-12 col-md-6 ">
                        <select name="tipo_identificacion" id="tipo_identificacion" class="form-select form-select-lg ">
                            <option selected disabled>--Seleciona--</option>
                            <option value="INE">INE</option>
                            <option value="DNI">Documento Nacional de Identidad (DNI)</option>
                            <option value="Cédula de Identidad">Cédula de Identidad</option>
                            <option value="Pasaporte">Pasaporte</option>
                            <option value="Carné de conducir">Carné de conducir</option>
                            <option value="Carné de residencia">Carné de residencia</option>
                            <option value="Tarjeta de identificación fiscal">Tarjeta de identificación fiscal</option>
                            <option value="Documento de identificación nacional">Documento de identificación nacional</option>
                            <option value="Número de Seguro Social (NSS)">Número de Seguro Social (NSS)</option>
                            <option value="Otro">Otro</option>

                        </select>
                        <label for="exampleFormControlInput1" class="form-label h4">Tipo de Identificacion</label>
                    </div>
                    <div class="mb-3 col-12 col-md-6 ">
                        <input type="text" class="form-control mb-2" id="exampleFormControlInput1" placeholder="Perez"
                            name="apellido_paterno">
                        <label for="exampleFormControlInput1" class="form-label h4">Numero Identificacion</label>
                    </div>
                    
                </div>


                <h3 class="mb-4 h3">Datos de contacto</h3>
                <div class="row">
                    <div class="mb-3 col-12 col-lg-6 ">
                        <input type="tel" class="form-control  mb-2" id="exampleFormControlInput1"
                            placeholder="555-555-555" name="telefono">
                        <label for="exampleFormControlInput1" class="form-label h4">Telefono</label>
                    </div>
                    <div class="mb-3 col-12 col-lg-6 ">
                        <input type="email" class="form-control mb-2" id="exampleFormControlInput1"
                            placeholder="correo@correo.com" name="email">
                        <label for="exampleFormControlInput1" class="form-label h4">Email</label>
                    </div>
                </div>

                <h3 class="mb-4 h3">Aseguradora</h3>
                <select name="aseguradora" id="aseguradora" class="form-select form-select-lg ">
                    <option disabled selected>--Elige una aseguradora--</option>
                    @foreach ($aseguradoras as $aseguradora)
                        <option value="{{ $aseguradora->name }}">{{ $aseguradora->name }}</option>
                    @endforeach
                    <option value="Ninguna">Ninguna</option>
                </select>


                <h3 class="mb-4 h3">Datos Medicos</h3>

                <label for="exampleFormControlInput1" class="form-label h4">Doctor</label>
                <select name="doctor" id="doctor" class=" form-select  form-select-lg">
                    <option disabled selected>--Elige un doctor--</option>
                    @foreach ($doctor as $doc)
                        <option value="{{ $doc->name }}">{{ $doc->name }}</option>
                    @endforeach
                    <option value="Ninguno">Ninguno</option>
                </select>
                

                
                <label for="exampleFormControlInput1" class="form-label h4 mt-5 ">Descipcion Medica</label>
                <textarea name="descripcion_medica" id="descripcion_medica" cols="30" rows="10" class="form-control"></textarea>
                
                <input type="submit" value="Registrar Paciente" class="btn btn-success  mt-5">
            </form>

        </div>

    </div>
@endsection