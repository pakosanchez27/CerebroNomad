@extends('layouts.app')

@section('titulo')
    Doctores - Editar
@endsection

@section('contenido')
    <div class="aseguradora-agregar-contenido p-5 d-flex justify-content-center ">

        <div class="formulario-agregar w-100 ">
            <div class="tabla__header   ">
                <p><span class="">Editar Doctor </span></p>
            </div>
            <form action="{{ route('doctores.update', $doctor->id) }}" method="POST" class="p-4 shadow  rounded-2 " novalidate>
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $doctor->name }}">
                    @error('nombre')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class=" row">
                    <div class="mb-3 col-12 col-md-6">
                        <label for="nombre" class="form-label">Apellido Paterno</label>
                        <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno"
                            value="{{ $doctor->apellido_paterno }}">
                        @error('apellido_paterno')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-12 col-md-6">
                        <label for="nombre" class="form-label">Apellido Materno</label>
                        <input type="text" class="form-control" id="apellido_materno" name="apellido_materno"
                            value="{{ $doctor->apellido_materno }}">

                    </div>

                </div>

                <div class="row">
                    <div class="mb-3 col col-md-6">
                        <label for="sexo" class="form-label">Sexo</label>
                        <select class="form-select form-select-lg " id="sexo" name="sexo">
                            <option value="M" {{ $doctor->sexo == 'M' ? 'selected' : '' }}>Masculino</option>
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
                            value="{{ $doctor->email }}">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class=" row">
                    <div class="mb-3 col-12 col-md-6">
                        <label for="nombre" class="form-label">Télefono</label>
                        <input type="tel" class="form-control" id="telefono" name="telefono"
                            value="{{ $doctor->telefono }}">
                        @error('telefono')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-12 col-md-6">
                        <label for="nombre" class="form-label">Especialidad</label>
                        <input type="text" class="form-control" id="especialidad" name="especialidad"
                            value="{{ $doctor->especialidad  }}">
                        @error('especialidad')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class=" row">
                    <div class="mb-3 col-12 col-md-6">
                        <label for="nombre" class="form-label">Cedula</label>
                        <input type="text" class="form-control" id="cedula" name="cedula"
                            value="{{ $doctor->cedula }}">
                        @error('cedula')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-12 col-md-6">
                        <label for="nombre" class="form-label">Clinia o Hospital</label>
                        <input type="text" class="form-control" id="nombre_clinica" name="nombre_clinica"
                            value="{{ $doctor->nombre_clinica }}">
                    </div>
                    @error('nombre_clinica')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nombre" class="form-label">Asistente</label>
                    <input type="text" class="form-control" id="asistente" name="asistente"
                        value="{{ $doctor->asistente }}">

                </div>

                <div class=" row">
                    <div class="mb-3 col-12 col-md-6">
                        <label for="nombre" class="form-label">Télefono Asistente</label>
                        <input type="tel" class="form-control" id="telefono_asistente" name="telefono_asistente"
                            value="{{ $doctor->telefono_asistente }}">

                    </div>
                    <div class="mb-3 col-12 col-md-6">
                        <label for="nombre" class="form-label">Email Asistente</label>
                        <input type="email" class="form-control" id="email_asistente" name="email_asistente"
                            value="{{ $doctor->email_asistente }}">

                    </div>
                </div>

                <button type="submit" class="btn btn-success  ">Guardar Cambios</button>

            </form>
        </div>


    </div>
@endsection
