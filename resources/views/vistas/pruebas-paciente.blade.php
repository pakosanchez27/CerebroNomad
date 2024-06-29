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
                        <p><span>Pruebas</span></p>
                    </div>

                    <div class=" border-black ">
                        <div class="d-flex flex-row align-items-center gap-5 ">
                            <div class="card shadow p-3 w-100 ">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Nombre de la prueba</th>
                                            <th>Toma de Muestra</th>
                                            <th>Fecha de Entrega</th>
                                            <th>Estado</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pruebas as $prueba)
                                            <tr>
                                                <td>{{ $prueba->prueba }}</td>
                                                <td>
                                                    @if($prueba->fecha_toma_muestra !== null)
                                                        Fecha: {{ \Carbon\Carbon::parse($prueba->fecha_toma_muestra)->format('d/m/Y') }}
                                                    @else
                                                        Sin asignar
                                                    @endif
                                                    <br>
                                                    <span>Hora: {{ $prueba->hora_toma_muestra }}</span>
                                                </td>
                                                <td>
                                                    @if($prueba->fecha_resultado !== null)
                                                        {{ \Carbon\Carbon::parse($prueba->fecha_resultado)->format('d/m/Y') }}
                                                    @else
                                                        Sin asignar
                                                    @endif
                                                </td>
                                                
                                                <td>{{ $prueba->estado }}</td>
                                                {{-- btn de agendar --}}

                                                <td>
                                                    @if ($prueba->fecha_toma_muestra === null)
                                                        <a href="" class="btn btn-info" data-bs-toggle="modal"
                                                            data-bs-target="#agendarToma({{ $prueba->id_proceso }})">Agendar</a>
                                                    @elseif ($prueba->estado === 'completado')
                                                        <button class="btn btn-success" disabled>Completado</button>
                                                    @elseif ($prueba->estado === 'Agendado')
                                                        <a href="" class="btn btn-warning" data-bs-toggle="modal"
                                                            data-bs-target="#fechaEntrega({{ $prueba->id_proceso }}">Entrega</a>
                                                    @elseif ($prueba->estado === 'Enviado')
                                                        <form class="EntregarResultado"
                                                            action="{{ route('completarEntrega', [$prueba->id_proceso, $paciente->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn btn-warning ">Entregar</button>
                                                        </form>
                                                    @endif
                                                </td>



                                            </tr>

                                            <!-- Modal -->

                                            {{-- modal agendar --}}
                                            <div class="modal fade" id="agendarToma({{ $prueba->id_proceso }})"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Agendar
                                                                Visita</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form
                                                                action="{{ route('agendar-toma', [$prueba->id_proceso, $paciente->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                <div class="mb-3">
                                                                    <h3 class=" fw-medium ">Toma de muestras del estudio
                                                                        {{ $prueba->prueba }}</h3>
                                                                    <label class=" form-label">Fecha</label>
                                                                    <input type="date" name="visita" id="visita"
                                                                        class="form-control" min="<?php echo date('Y-m-d'); ?>">

                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class=" form-label">Hora de la visita</label>
                                                                    <input type="time" name="hora" id="hora"
                                                                        class="form-control" min="09:00" max="21:00">

                                                                </div>
                                                                <div class="mb-3">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal"
                                                                        onclick="reseat()">Cerrar</button>
                                                                    <button type="submit" onclick="reseat()"
                                                                        class="btn btn-primary">Enviar</button>
                                                                </div>
                                                            </form>


                                                        </div>
                                                        <div class="modal-footer">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- modal fecha entrega --}}

                                            <div class="modal fade" id="fechaEntrega({{ $prueba->id_proceso }}"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Agendar
                                                                Entrega</h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form
                                                                action="{{ route('agendar-resultados', [$prueba->id_proceso, $paciente->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                <div class="mt-3">
                                                                    <h3 class=" fw-medium ">Entrega de resultados del
                                                                        estudio
                                                                        {{ $prueba->prueba }}</h3>
                                                                    <label class=" form-label">Fecha</label>
                                                                    <input type="date" name="visita" id="visita"
                                                                        class="form-control" min="<?php echo date('Y-m-d'); ?>">

                                                                </div>

                                                                <div class="mb-3">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal"
                                                                        onclick="reseat()">Cerrar</button>
                                                                    <button type="submit" onclick="reseat()"
                                                                        class="btn btn-primary">Enviar</button>
                                                                </div>
                                                            </form>


                                                        </div>
                                                        <div class="modal-footer">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection


{{-- Modales --}}
