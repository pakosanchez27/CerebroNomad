@extends('layouts.app')

@section('titulo')
    Doctores - agregar
@endsection

@section('contenido')
    <div class="aseguradora-agregar-contenido p-5 d-flex justify-content-center ">

        <div class="formulario-agregar w-100 ">
            <div class="tabla__header   ">
                <p><span class="">Agregar Doctor </span></p>
            </div>
            <form action="{{ route('doctores.store') }}" method="POST" class="p-4 shadow  rounded-2 " novalidate>
                @csrf
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}">
                    @error('nombre')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class=" row">
                    <div class="mb-3 col-12 col-md-6">
                        <label for="nombre" class="form-label">Apellido Paterno</label>
                        <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno"
                            value="{{ old('apellido_paterno') }}">
                        @error('apellido_paterno')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-12 col-md-6">
                        <label for="nombre" class="form-label">Apellido Materno</label>
                        <input type="text" class="form-control" id="apellido_materno" name="apellido_materno"
                            value="{{ old('apellido_materno') }}">

                    </div>

                </div>

                <div class="row">
                    <div class="mb-3 col col-md-6">
                        <label for="sexo" class="form-label">Sexo</label>
                        <select class="form-select form-select-lg " id="sexo" name="sexo">
                            <option value="M" {{ old('sexo') == 'M' ? 'selected' : '' }}>Masculino</option>
                            <option value="F" {{ old('sexo') == 'F' ? 'selected' : '' }}>Femenino</option>
                        </select>
                        @error('sexo')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-12 col-md-6">
                        <label for="nombre" class="form-label">Email </label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ old('email') }}">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class=" row">
                    <div class="mb-3 col-12 col-md-6">
                        <label for="nombre" class="form-label">Télefono</label>
                        <input type="tel" class="form-control" id="telefono" name="telefono"
                            value="{{ old('telefono') }}">
                        @error('telefono')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-12 col-md-6">
                        <label for="nombre" class="form-label">Especialidad</label>
                        <input type="text" class="form-control" id="especialidad" name="especialidad"
                            value="{{ old('especialidad') }}">
                        @error('especialidad')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class=" row">
                    <div class="mb-3 col-12 col-md-6">
                        <label for="nombre" class="form-label">Cedula</label>
                        <input type="text" class="form-control" id="cedula" name="cedula"
                            value="{{ old('cedula') }}">
                        @error('cedula')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-12 col-md-6">
                        <label for="nombre" class="form-label">Clinia o Hospital</label>
                        <input type="text" class="form-control" id="nombre_clinica" name="nombre_clinica"
                            value="{{ old('nombre_clinica') }}">
                    </div>
                    @error('nombre_clinica')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nombre" class="form-label">Asistente</label>
                    <input type="text" class="form-control" id="asistente" name="asistente"
                        value="{{ old('asistente') }}">
                  
                </div>

                <div class=" row">
                    <div class="mb-3 col-12 col-md-6">
                        <label for="nombre" class="form-label">Télefono Asistente</label>
                        <input type="tel" class="form-control" id="telefono_asistente" name="telefono_asistente"
                            value="{{ old('telefono_asistente') }}">
                      
                    </div>
                    <div class="mb-3 col-12 col-md-6">
                        <label for="nombre" class="form-label">Email Asistente</label>
                        <input type="email" class="form-control" id="email_asistente" name="email_asistente"
                            value="{{ old('email_asistente') }}">
                      
                    </div>
                </div>

                <button type="submit" class="btn btn-success  ">Agregar</button>

            </form>
        </div>
        
        
    </div>
@endsection
