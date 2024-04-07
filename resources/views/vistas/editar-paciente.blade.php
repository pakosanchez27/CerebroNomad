@extends('layouts.app')

@section('titulo')
    Pacientes - Editar
@endsection

@section('contenido')
    <div class="agregar-paciente bg-secondary-subtle h-100 d-flex justify-content-center alince p-5   ">
        <div class=" agregar-paciente__contenedor bg-white  p-5 rounded-4 shadow ">
            <div class="contenido-roles__texto">
                <h2>Editar del Paciente</h2>
                <p>Edita los datos del paciente </p>
            </div>
            <form class="agregar-paciente__datosPersonales" action="{{ route('pacientes.update', $paciente->id) }}" method="post" novalidate>
                @csrf
                @method('PUT')
                <h3 class="mb-4">Nombre completo</h3>
                <div class="row">
                    <div class="mb-3 col-12 col-md-12 col-lg">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="name"
                            value="{{ $paciente->name }}">
                        @error('name')
                            <div class="text-danger h5 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-12 col-md-6 col-lg">
                        <label for="apellido_paterno" class="form-label">Apellido Paterno</label>
                        <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno"
                            value="{{ $paciente->apellido_paterno }}">
                        @error('apellido_paterno')
                            <div class="text-danger h5 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-12 col-md-6 col-lg">
                        <label for="apellido_materno" class="form-label">Apellido Materno</label>
                        <input type="text" class="form-control" id="apellido_materno" name="apellido_materno"
                            value="{{ $paciente->apellido_materno }}">
                        @error('apellido_materno')
                            <div class="text-danger h5 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg">
                        <h3 class="mb-4">Fecha de nacimiento</h3>
                        <input class="form-control w-100 mb-4" type="date" name="fecha_nacimiento" id="fecha_nacimiento"
                            value="{{ $paciente->fecha_nacimiento }}">
                        @error('fecha_nacimiento')
                            <div class="text-danger h5 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 col-lg">
                        <h3 class="mb-4">Tipo de Sangre</h3>
                        <select name="tipo_sangre" id="tipo_sangre" class="form-select form-select-lg">
                            <option selected  value="{{ $paciente->tipo_sangre }}">{{ $paciente->tipo_sangre }}</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                        @error('tipo_sangre')
                            <div class="text-danger h5 mt-2">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="mb-3 col-12 col-lg">
                        <h3 class="mb-4">Sexo</h3>
                        <select class="form-select form-select-lg" id="sexo" name="sexo">
                            <option selected value="{{ $paciente->sexo }}">{{ $paciente->sexo }}</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenido">Femenino</option>
                            <option value="O">Otro</option>
                        </select>
                    </div>
                </div>

                <h3 class="mb-4">Identificación</h3>
                <div class="row">
                    <div class="mb-3 col-12 col-md-6">
                        <label for="tipo_identificacion" class="form-label ">Tipo de Identificación</label>
                        <select class="form-select form-select-lg " id="tipo_identificacion" name="tipo_identificacion">
                            <option selected value="{{ $paciente->tipo_identificacion }}">{{ $paciente->tipo_identificacion }}</option>
                            <option value="INE">INE</option>
                            <option value="DNI">Documento Nacional de Identidad (DNI)</option>
                            <option value="Cédula de Identidad">Cédula de Identidad</option>
                            <option value="Pasaporte">Pasaporte</option>
                            <option value="Carné de conducir">Carné de conducir</option>
                            <option value="Carné de residencia">Carné de residencia</option>
                            <option value="Tarjeta de identificación fiscal">Tarjeta de identificación fiscal</option>
                            <option value="Documento de identificación nacional">Documento de identificación nacional
                            </option>
                            <option value="Número de Seguro Social (NSS)">Número de Seguro Social (NSS)</option>
                            <option value="Otro">Otro</option>
                        </select>
                        @error('tipo_identificacion')
                            <div class="text-danger h5 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-12 col-md-6">
                        <label for="numero_identificacion" class="form-label">Número de Identificación</label>
                        <input type="text" class="form-control" id="numero_identificacion" name="numero_identificacion"
                            value="{{ $paciente->num_identificacion }}">
                        @error('numero_identificacion')
                            <div class="text-danger h5 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <h3 class="mb-4">Datos de contacto</h3>
                <div class="row">
                    <div class="mb-3 col-12 col-lg-6">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="tel" class="form-control" id="telefono" name="telefono"
                            value="{{ $paciente->telefono }}">
                        @error('telefono')
                            <div class="text-danger h5 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-12 col-lg-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" value="{{ $paciente->email }}"
                            name="email">
                        @error('email')
                            <div class="text-danger h5 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <h3 class="mb-4">Aseguradora</h3>
                <select name="aseguradora" id="aseguradora" class="form-select form-select-lg">
                    <option disabled selected>--Elige una aseguradora--</option>
                    @foreach ($aseguradoras as $aseguradora)
                        <option selected value="{{ $aseguradora->id }}"> {{ $aseguradora->name }}</option>
                        <option value="{{ $aseguradora->id }}">{{ $aseguradora->name }}</option>
                    @endforeach
                    <option value="Ninguna">Ninguna</option>
                </select>
                @error('aseguradora')
                    <div class="text-danger h5 mt-2">{{ $message }}</div>
                @enderror

                <h3 class="mb-4">Datos Médicos</h3>
                <div class="mb-3">
                    <label for="doctor" class="form-label">Doctor</label>
                    <select name="doctor" id="doctor" class="form-select form-select-lg">
                        <option disabled selected>--Elige un doctor--</option>
                        @foreach ($doctores as $doctor)
                            <option selected value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                            <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                        @endforeach
                        <option value="Ninguno">Ninguno</option>
                    </select>
                    @error('doctor')
                        <div class="text-danger h5 mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="descripcion_medica" class="form-label">Descripción Médica</label>
                    <textarea name="descripcion_medica" id="descripcion_medica" cols="30" rows="10" class="form-control"> {{$paciente->descripcion_medica}}</textarea>
                    @error('descripcion_medica')
                        <div class="text-danger h5 mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <input type="submit" value="Actuañizar Paciente" class="btn btn-success mt-5">
            </form>


        </div>

    </div>
@endsection
