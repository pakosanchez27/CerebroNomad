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
            <form class="agregar-paciente__datosPersonales" action="{{route('pacientes.store')}}" method="post" novalidate>
                @csrf
                <h3 class="mb-4">Nombre completo</h3>
                <div class="row">
                    <div class="mb-3 col-12 col-md-12 col-lg">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre"  name="name" value="{{old('name')}}">
                        @error('name')
                            <div class="text-danger h5 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-12 col-md-6 col-lg">
                        <label for="apellido_paterno" class="form-label">Apellido Paterno</label>
                        <input type="text" class="form-control" id="apellido_paterno"  
                            name="apellido_paterno" value="{{old('apellido_paterno')}}">
                        @error('apellido_paterno')
                            <div class="text-danger h5 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-12 col-md-6 col-lg">
                        <label for="apellido_materno" class="form-label">Apellido Materno</label>
                        <input type="text" class="form-control" id="apellido_materno" 
                            name="apellido_materno">
                    
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg">
                        <h3 class="mb-4">Fecha de nacimiento</h3>
                        <input class="form-control w-100 mb-4" type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="{{old('fecha_nacimiento')}}">
                        @error('fecha_nacimiento')
                            <div class="text-danger h5 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 col-lg">
                        <h3 class="mb-4">Tipo de Sangre</h3>
                        <select name="tipo_sangre" id="tipo_sangre" class="form-select form-select-lg">
                            <option selected disabled>--Seleccione--</option>
                            <option value="A+" {{ old('tipo_sangre') == 'A+' ? 'selected' : '' }}>A+</option>
                            <option value="A-" {{ old('tipo_sangre') == 'A-' ? 'selected' : '' }}>A-</option>
                            <option value="B+" {{ old('tipo_sangre') == 'B+' ? 'selected' : '' }}>B+</option>
                            <option value="B-" {{ old('tipo_sangre') == 'B-' ? 'selected' : '' }}>B-</option>
                            <option value="AB+" {{ old('tipo_sangre') == 'AB+' ? 'selected' : '' }}>AB+</option>
                            <option value="AB-" {{ old('tipo_sangre') == 'AB-' ? 'selected' : '' }}>AB-</option>
                            <option value="O+" {{ old('tipo_sangre') == 'O+' ? 'selected' : '' }}>O+</option>
                            <option value="O-" {{ old('tipo_sangre') == 'O-' ? 'selected' : '' }}>O-</option>
                        </select>
                        
                        @error('tipo_sangre')
                            <div class="text-danger h5 mt-2">{{ $message }}</div>
                        @enderror
                        
                    </div>
                    <div class="mb-3 col-12 col-lg">
                        <h3 class="mb-4">Sexo</h3>
                        <select class="form-select form-select-lg" id="sexo" name="sexo">
                            <option selected disabled>--Selecciona--</option>
                            <option value="Masculino" {{ old('sexo') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                            <option value="Femenino" {{ old('sexo') == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                            <option value="O" {{ old('sexo') == 'O' ? 'selected' : '' }}>Otro</option>
                        </select>
                        
                    </div>
                </div>

                <h3 class="mb-4">Identificación</h3>
                <div class="row">
                    <div class="mb-3 col-12 col-md-6">
                        <label for="tipo_identificacion" class="form-label ">Tipo de Identificación</label>
                        <select class="form-select form-select-lg" id="tipo_identificacion" name="tipo_identificacion">
                            <option selected disabled>--Seleccione--</option>
                            <option value="INE" {{ old('tipo_identificacion') == 'INE' ? 'selected' : '' }}>INE</option>
                            <option value="DNI" {{ old('tipo_identificacion') == 'DNI' ? 'selected' : '' }}>Documento Nacional de Identidad (DNI)</option>
                            <option value="Cédula de Identidad" {{ old('tipo_identificacion') == 'Cédula de Identidad' ? 'selected' : '' }}>Cédula de Identidad</option>
                            <option value="Pasaporte" {{ old('tipo_identificacion') == 'Pasaporte' ? 'selected' : '' }}>Pasaporte</option>
                            <option value="Carné de conducir" {{ old('tipo_identificacion') == 'Carné de conducir' ? 'selected' : '' }}>Carné de conducir</option>
                            <option value="Carné de residencia" {{ old('tipo_identificacion') == 'Carné de residencia' ? 'selected' : '' }}>Carné de residencia</option>
                            <option value="Tarjeta de identificación fiscal" {{ old('tipo_identificacion') == 'Tarjeta de identificación fiscal' ? 'selected' : '' }}>Tarjeta de identificación fiscal</option>
                            <option value="Documento de identificación nacional" {{ old('tipo_identificacion') == 'Documento de identificación nacional' ? 'selected' : '' }}>Documento de identificación nacional</option>
                            <option value="Número de Seguro Social (NSS)" {{ old('tipo_identificacion') == 'Número de Seguro Social (NSS)' ? 'selected' : '' }}>Número de Seguro Social (NSS)</option>
                            <option value="Otro" {{ old('tipo_identificacion') == 'Otro' ? 'selected' : '' }}>Otro</option>
                        </select>
                        
                        @error('tipo_identificacion')
                            <div class="text-danger h5 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-12 col-md-6">
                        <label for="numero_identificacion" class="form-label">Número de Identificación</label>
                        <input type="text" class="form-control" id="numero_identificacion" name="numero_identificacion" value="{{old('numero_identificacion')}}">
                        @error('numero_identificacion')
                            <div class="text-danger h5 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <h3 class="mb-4">Datos de contacto</h3>
                <div class="row">
                    <div class="mb-3 col-12 col-lg-6">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="tel" class="form-control" id="telefono"  name="telefono" value="{{old('telefono')}}">
                        @error('telefono')
                            <div class="text-danger h5 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-12 col-lg-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" 
                            name="email" value="{{old('email')}}">
                        @error('email')
                            <div class="text-danger h5 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <h3 class="mb-4">Aseguradora</h3>
                <select name="aseguradora" id="aseguradora" class="form-select form-select-lg">
                    <option disabled selected>--Elige una aseguradora--</option>
                    @foreach ($aseguradoras as $aseguradora)
                        <option value="{{ $aseguradora->id }}" {{ old('aseguradora') == $aseguradora->id ? 'selected' : '' }}>{{ $aseguradora->name }}</option>
                    @endforeach
                   
                </select>
                @error('aseguradora')
                    <div class="text-danger h5 mt-2">{{ $message }}</div>
                @enderror

                <h3 class="mb-4">Datos Médicos</h3>
                <div class="mb-3">
                    <label for="doctor" class="form-label">Doctor</label>
                    <select class="form-select form-select-lg" id="doctor" name="doctor">
                        <option disabled selected>--Elige un doctor--</option>
                        @foreach ($doctores as $doctor)
                            <option value="{{ $doctor->id }}" {{ old('doctor') == $doctor->id ? 'selected' : '' }}>{{ $doctor->name }}</option>
                        @endforeach
                        
                    </select>                    
                    @error('doctor')
                        <div class="text-danger h5 mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="descripcion_medica" class="form-label">Descripción Médica</label>
                    <textarea name="descripcion_medica" id="descripcion_medica" cols="30" rows="10" class="form-control">{{old("descripcion_medica")}}</textarea>
                    @error('descripcion_medica')
                        <div class="text-danger h5 mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <input type="submit" value="Registrar Paciente" class="btn btn-success mt-5">
            </form>


        </div>

    </div>
@endsection
