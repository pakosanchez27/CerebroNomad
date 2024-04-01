@extends('layouts.app')

@section('titulo')
    Doctor - {{ $doctor->name }}
@endsection

@section('contenido')

<div class="container-doctor-info ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-doctor-info">
                <div class="tabla__header text-white  fw-medium ">
                    Información del Doctor
                </div>
                <div class="card-body-doctor-info">
                    <h3 class="mb-2">Nombre del Doctor: <span class=" fw-light ">{{$doctor->name}}</span></h3>
                    <p class=" fw-bold ">Apellido Paterno: <span class=" fw-light ">{{$doctor->apellido_paterno}}</span> </p>
                    <p class=" fw-bold ">Apellido Materno: <span class=" fw-light ">{{$doctor->apellido_materno}}</span></p>
                    <p class=" fw-bold ">Teléfono:  <span class=" fw-light ">{{$doctor->telefono}}</span></p>
                    <p class=" fw-bold ">Email: <span class=" fw-light ">{{$doctor->email}}</span></p>
                    <p class=" fw-bold ">Especialidad: <span class=" fw-light ">{{$doctor->especialidad}}</span></p>
                    <p class=" fw-bold ">Cédula: <span class=" fw-light ">{{$doctor->cedula}}</span> </p>
                    <p class=" fw-bold ">Clínica / Hospital: <span class=" fw-light ">{{$doctor->nombre_clinica}}</span> </p>
                    <p class=" fw-bold ">Asistente: <span class=" fw-light ">{{$doctor->asistente}}</span></p>
                    <p class=" fw-bold ">Teléfono del Asistente: <span class=" fw-light ">{{$doctor->telefono_asistente}}</span></p>
                    <p class=" fw-bold ">Email del Asistente: <span class=" fw-light ">{{$doctor->email_asistente}}</span></p>
                    <a href="{{route('doctores')}}" class="btn btn-info text-white   ">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
            