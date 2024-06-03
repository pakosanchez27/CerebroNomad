@extends('layouts.app')

@section('titulo')
@endsection

@section('contenido')
    <header class="header bg-dark-blue">
        <div class="container text-center narrow-width">
            <h1 class="title text-gray-50">
                Estudio Pendientes
            </h1>
        </div>
    </header>

    </header>
    <div class="contenido-paciente__cards p-5 row gap-5 mt-5 ">
        @foreach ($pacientes as $paciente)
            <div class="card_paciente card p-5 shadow mb-5">
                <img src="{{ asset('img/paciente-icon.png') }}" alt="" width="50px">
                <h3 class="mt-2">{{ $paciente->name }} {{ $paciente->apellido_paterno }}</h3>
                <span>@php
                    $fecha_nacimiento = $paciente->fecha_nacimiento;
                    $fecha_nacimiento = \Carbon\Carbon::parse($fecha_nacimiento)->age;
                    echo $fecha_nacimiento;
                @endphp años</span>
                <p class="h4 fw-bold">Tipo de sangre: <span
                        class="h3 fw-normal text-danger">{{ $paciente->tipo_sangre }}</span></p>
                <hr>
                <div class="d-flex gap-5 justify-content-center align-items-center">
                    @if ($rol == 'admin')
                        <form class="deleteForm" action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" id="delete">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                                    class="bi bi-trash" viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                    <path
                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                </svg>
                            </button>
                        </form>
                    @endif
                </div>
                <div class="estudios-historial">
                    <a href="{{ route('pruebas-paciente', $paciente->id) }}" class="btn btn-danger w-100 mt-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                            class="bi bi-card-checklist" viewBox="0 0 16 16">
                            <path
                                d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z" />
                            <path
                                d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0M7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0" />
                        </svg>
                        Pendiente
                    </a>
                </div>
            </div>
        @endforeach

    </div>
@endsection
