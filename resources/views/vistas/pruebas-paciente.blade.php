@extends('layouts.app')

@section('titulo')
    Pacientes - detalles
@endsection

@section('contenido')
    <div class="contenido-perfilpaciente bg-secondary-subtle h-100  ">
        <h2 class=" text-center m-5 bg-primary p-3 text-white rounded-3  ">Historial de pruebas</h2>
        <div class="row">
            <div class="contenido-perfilPaciente__cardPerfil col-12 col-lg-4 p-5">
                <div class="card cardPaciente p-3 shadow  border-black ">
                    <div class="d-flex flex-row align-items-center gap-5 ">
                        <div class="imgPaciente">
                            @if ($paciente->sexo === 'Mujer')
                                <img src="{{ asset('img/PerfilMujer.png') }}" alt="" width="150px">
                            @else
                                <img src="{{ asset('img/PerfilHombre.png') }}" alt="" width="150px">
                            @endif
                        </div>
                        <div class="datosPaciente">
                            <h3>{{ $paciente->name }} {{ $paciente->apellido_paterno }} {{ $paciente->apellido_materno }}
                            </h3>
                            <p><span class=" fw-bold ">Edad</span>: @php
                                $fecha = new DateTime($paciente->fecha_nacimiento);
                                $hoy = new DateTime();
                                $edad = $hoy->diff($fecha);
                                echo $edad->y;
                            @endphp años </p>
                            <p class="fw-bold">Fecha Nacimiento: <span class=" fw-light "> @php
                                $fecha = new DateTime($paciente->fecha_nacimiento);
                                echo $fecha->format('d-m-Y');
                            @endphp</span></p>
                            <p><span class=" fw-bold ">Sexo:</span> {{ $paciente->sexo }} </p>
                            <p class=" text-danger "><span class=" fw-bold  text-black ">Tipo de sangre:</span>
                                {{ $paciente->tipo_sangre }}</p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="contenido-perfilPaciente__datos col-12 col-lg-8 p-5">

                <div class="mb-5">
                    <div class="tabla__header ">
                        <p><span>Pruebas Ac </span></p>
                    </div>

                    <div class=" border-black ">
                        <div class="d-flex flex-row align-items-center gap-5 ">
                            <div class="card shadow p-3 w-100 ">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Nombre de la prueba</th>
                                            <th>Fecha de inicio</th>
                                            <th>Fecha de finalización</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Prueba de 5 elementos</td>
                                            <td>Sin asignar</td>
                                            <td>Sin asignar</td>
                                            <td>En espera</td>
                                            {{-- btn de agendar --}}
                                            <td><a class="btn btn-success">Agendar</a></td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-5 mt-5">
                    <div class="texto_hader">
                        <h3>Pruebas completadas</h3>
                    </div>

                    <div class="card cardPaciente p-3 shadow  border-black ">
                        <div class="d-flex flex-row align-items-center gap-5 ">

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
