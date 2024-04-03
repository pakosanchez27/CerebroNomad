@extends('layouts.app')

@section('titulo')
    Pacientes
@endsection

@section('contenido')
    <div
        class="contenido-aseguradoras__header  d-flex flex-column flex-md-row justify-content-between align-items-center p-5 ">
        <div class="contenido-roles__texto text-center text-md-start">
            <h2>Pacientes</h2>
            <p>Administración, alta y seguimiento de pacientes</p>
        </div>
        <div class="boton-agregar">
            <a href="{{ route('pacientes.create') }}"
                class="btn btn-success text-white d-flex justify-content-center  align-items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                    <path
                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                </svg>
                <P class="">Nuevo Paciente</P>
            </a>
        </div>
    </div>

    <div class="contendo-paciente">
        <div class=" contenido-paciente__cards p-5 row gap-5 ">
            @foreach ($pacientes as $paciente)
                <div class="card_paciente card p-5 shadow mb-5 ">
                    <img src="{{ asset('img/paciente-icon.png') }}" alt="" width="50px">
                    <h3 class="mt-2">{{ $paciente->name }} {{ $paciente->apellido_paterno }}</h3>
                    <span>@php
                        $fecha_nacimiento = $paciente->fecha_nacimiento;
                        $fecha_nacimiento = \Carbon\Carbon::parse($fecha_nacimiento)->age;
                        echo $fecha_nacimiento;
                    @endphp años</span>
                    <p class="h4 fw-bold ">Tipo de sangre: <span
                            class="h3  fw-normal  text-danger  ">{{ $paciente->tipo_sangre }}</span></p>
                    <hr>
                    <div class="d-flex gap-5 justify-content-center ">
                        <a href="{{ route('pacientes.show', $paciente->id) }}" class="btn btn-info"><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                                class="bi bi-eye-fill" viewBox="0 0 16 16">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                <path
                                    d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                            </svg></a>
                        <a href="{{ route('pacientes.edit', 1) }}" class="btn btn-warning"><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                                class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd"
                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                            </svg></a>
                        <form action="{{ route('pacientes.destroy', 1) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="white" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                    <path
                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                </svg></button>
                        </form>
                    </div>
                    <div class="estudios-historial">
                        <a href="#" class="btn btn-secondary  w-100 mt-5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-card-checklist" viewBox="0 0 16 16">
                                <path
                                    d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z" />
                                <path
                                    d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0M7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0" />
                            </svg>
                            Pruebas
                        </a>
                    </div>
                </div>
            @endforeach

        </div>


    </div>

    {{-- mensajes --}}
    @if (@session('agregado'))
        <script>
            alert('{{ session('agregado') }}');
        </script>
    @endif
    @if (@session('actualizado'))
        <script>
            alert('{{ session('actualizado') }}');
        </script>
    @endif
    @if (@session('eliminado'))
        <script>
            alert('{{ session('eliminado') }}');
        </script>
    @endif
@endsection
