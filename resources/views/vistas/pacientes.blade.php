@extends('layouts.app')

@section('titulo')
    Pacientes
@endsection

@section('contenido')
    <div
        class="contenido-aseguradoras__header  d-flex flex-column flex-md-row justify-content-between align-items-center px-5 mt-3 ">
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
<div class="contenido-buscar-paciente shadow rounded bg-white m-3 p-3">
    <h3 class="mb-3 text-center">Buscar Paciente</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            ¡Los datos ingresados no son válidos!
        </div>
    @endif
    <form action="{{ route('pacientes.buscar') }}" method="get">
        <div class="row gx-2 gy-2 align-items-end">
            <div class="col-sm-4">
                <label for="Nombre" class="form-label">Nombre:</label>
                <input type="text" name="Nombre" id="NombreInput" class="form-control" placeholder="Ingresa el Nombre">
            </div>
            <div class="col-sm-4">
                <label for="ApellidoPaterno" class="form-label">Apellido Paterno:</label>
                <input type="text" name="ApellidoPaterno" id="ApellidoPaternoInput" class="form-control" placeholder="Ingresa el apellido paterno">
            </div>
            <div class="col-sm-4">
                <label for="ApellidoMaterno" class="form-label">Apellido Materno:</label>
                <input type="text" name="ApellidoMaterno" id="ApellidoMaternoInput" class="form-control" placeholder="Ingresa el apellido Materno">
            </div>
            <div class="col-sm-4 mt-3 ">
                <button type="submit" class="btn btn-success w-100">Buscar</button>
            </div>
        </div>
    </form>
</div>

    
    
    
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
                    <a href="{{ route('pacientes.show', $paciente->id) }}" class="btn btn-info">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                            class="bi bi-eye-fill" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                            <path
                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                        </svg>
                    </a>
                    <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-warning">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                            class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path
                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd"
                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                        </svg>
                    </a>
                    @if ($rol == 'admin')
                        <form class="deleteForm m-0" action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger alif" id="delete">
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
                    <a href="{{ route('venta.create', $paciente->id) }}"
                        class="btn btn-secondary turquesa border-0 w-100 mt-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-heart" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0M14 14V5H2v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1M8 7.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132"/>
                          </svg>
                        Nueva Venta
                    </a>
                </div>
                <div class="estudios-historial">
                    <a href="{{ route('pruebas-paciente', $paciente->id) }}" class="btn btn-secondary w-100 mt-5">
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
        <nav aria-label="Page navigation" class="text-center">
            <ul class="pagination justify-content-center pagination-lg">
                <!-- Botón de "Previous" -->
                @if ($pacientes->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">Previous</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $pacientes->previousPageUrl() }}" tabindex="-1">Previous</a>
                    </li>
                @endif
                @foreach ($pacientes as $index => $pagina)
                    <li class="page-item {{ $index + 1 == $current_page ? 'active' : '' }}">
                        <a class="page-link" href="{{ $pacientes->url($index + 1) }}">{{ $index + 1 }}</a>
                    </li>
                @endforeach

                <!-- Botón de "Next" -->
                @if ($pacientes->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $pacientes->nextPageUrl() }}">Next</a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link">Next</span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
    </div>
    {{-- mensajes --}}
    @if (@session('agregado'))
        <script>
            Swal.fire({
                icon: "success",
                title: "Paciente agregado correctamente",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif
    @if (@session('editado'))
        <script>
            Swal.fire({

                icon: "success",
                title: "Paciente actualizado correctamente",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif
    @if (@session('eliminado'))
        <script>
            Swal.fire({

                icon: "success",
                title: "Paciente eliminado correctamente",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif
@endsection




<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
