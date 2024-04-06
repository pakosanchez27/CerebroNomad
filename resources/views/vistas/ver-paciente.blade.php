@extends('layouts.app')

@section('titulo')
    Pacientes - detalles
@endsection

@section('contenido')
    <div class="contenido-perfilpaciente bg-secondary-subtle h-100  ">
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

                <div class="">
                    <div class="tabla__header  ">
                        <p><span class="">Datos del paciente </span></p>

                    </div>

                    <div class="bg-white rounded-3 p-3 shadow ">
                        <div class="row">
                            <fieldset>
                                <div class="d-flex  justify-content-between align-items-center p-3">
                                    <h3>Datos Generales</h3>
                                    <a href="#" class="btn btn-warning">Editar</a>
                                </div>

                                <form>
                                    <fieldset disabled>
                                        <div class="row">
                                            <div class="mb-3 col-12 col-md">
                                                <label for="disabledTextInput" class="form-label">Tipo de
                                                    identificacion</label>
                                                <input type="text" id="disabledTextInput" class="form-control"
                                                    placeholder="{{ $paciente->tipo_identificacion }}">
                                            </div>
                                            <div class="mb-3 col-12 col-md">
                                                <label for="disabledSelect" class="form-label">Numero de
                                                    Identificación</label>
                                                <input type="text" id="disabledTextInput" class="form-control"
                                                    placeholder="{{ $paciente->num_identificacion }}">
                                            </div>
                                        </div>
                                        <div class="mb-3 col-12 col-md">
                                            <label for="disabledSelect" class="form-label">Aseguradora</label>
                                            <input type="text" id="disabledTextInput" class="form-control"
                                                placeholder="@if ($aseguradora == null) Ninguno
                                                @else
                                                    {{ $aseguradora->name }} @endif">
                                        </div>

                                    </fieldset>
                                </form>
                                <div class="d-flex  justify-content-between align-items-center p-3">
                                    <h3>Datos de contacto</h3>
                                </div>

                                <form>
                                    <fieldset disabled>
                                        <div class="row">
                                            <div class="mb-3 col-12 col-md">
                                                <label for="disabledTextInput" class="form-label">Email</label>
                                                <input type="text" id="disabledTextInput" class="form-control"
                                                    placeholder="{{ $paciente->email }}">
                                            </div>
                                            <div class="mb-3 col-12 col-md">
                                                <label for="disabledSelect" class="form-label">Telefono</label>
                                                <input type="text" id="disabledTextInput" class="form-control"
                                                    placeholder="{{ $paciente->telefono }}">
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>

                                <div class="d-flex  justify-content-between align-items-center p-3">
                                    <h3>Datos de Medicos</h3>
                                </div>

                                <form>
                                    <fieldset disabled>

                                        <div class="mb-3 ">
                                            <label for="disabledTextInput" class="form-label">Doctor</label>
                                            <input type="text" id="disabledTextInput" class="form-control"
                                                placeholder="@if ($doctor == null) Ninguno
                                                @else{{ $doctor->name }} {{ $doctor->apellido_paterno }} {{ $doctor->apellido_materno }} @endif">
                                        </div>
                                        <div class="mb-3 ">
                                            <label for="disabledSelect" class="form-label">Descripcion Medica</label>
                                            <textarea class="form-control" id="" cols="30" rows="10">@if ($doctor == null) Ninguna @else {{ $paciente->descripcion_medica }}
                                                @endif
                                            </textarea>

                                        </div>

                                    </fieldset>
                                </form>
                        </div>


                    </div>
                </div>

                <div class="">
                    <div class="tabla__header mt-5  d-flex  justify-content-between ">
                        <p><span class="">Direccion del paciente </span></p>
                        @if ($direccion == null)
                            <a href="" class="btn btn-success ">Agregar</a>
                        @else
                            <a href="#" class="btn btn-warning">Editar</a>
                        @endif


                    </div>

                    <div class="bg-white rounded-3 p-3 shadow ">
                        <div class="row">
                            @if ($direccion == null)
                                <p>No tiene una direccion registrada</p>
                            @else
                                <form>
                                    <fieldset disabled>
                                        <div class="row">
                                            <div class="mb-3 col-12 col-md">

                                                <div class="row">
                                                    <div class="mb-3 col-12 col-md">
                                                        <input type="text" id="disabledTextInput" class="form-control"
                                                            placeholder="{{ $direccion->calle }}">
                                                        <label for="disabledTextInput" class="form-label">Tipo de
                                                            identificacion</label>
                                                    </div>
                                                    <div class="mb-3 col-12 col-md">
                                                        <input type="text" id="disabledTextInput" class="form-control"
                                                            placeholder="{{ $direccion->numero }}">
                                                        <label for="disabledTextInput" class="form-label">Numero</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="mb-3 col-12 col-md">
                                                        <input type="text" id="disabledTextInput" class="form-control"
                                                            placeholder="{{ $direccion->colonia }}">
                                                        <label for="disabledTextInput" class="form-label">Colonia</label>
                                                    </div>
                                                    <div class="mb-3 col-12 col-md">
                                                        <input type="text" id="disabledTextInput" class="form-control"
                                                            placeholder="{{ $direccion->codigo_postal }}">
                                                        <label for="disabledTextInput" class="form-label">Codigo
                                                            Postal</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="mb-3 col-12 col-md">
                                                        <input type="text" id="disabledTextInput" class="form-control"
                                                            placeholder="{{ $direccion->ciudad }}">
                                                        <label for="disabledTextInput" class="form-label">Ciudad</label>
                                                    </div>
                                                    <div class="mb-3 col-12 col-md">
                                                        <input type="text" id="disabledTextInput" class="form-control"
                                                            placeholder="{{ $direccion->estado }}">
                                                        <label for="disabledTextInput" class="form-label">Estado</label>
                                                    </div>

                                                </div>
                                                <div class="mb-3 col-12 col-md">
                                                    <input type="text" id="disabledTextInput" class="form-control"
                                                        placeholder="{{ $direccion->pais }}">
                                                    <label for="disabledTextInput" class="form-label">Pais</label>
                                                </div>

                                                <div class="mb-3 col-12 col-md">

                                                    <label for="disabledSelect" class="form-label ">Referencias</label>
                                                    <textarea class="form-control" id="" cols="30" rows="10">{{ $direccion->referencias }}</textarea>
                                                </div>


                                            </div>


                                    </fieldset>
                                </form>
                            @endif

                        </div>


                    </div>
                </div>

                <div class="">
                    <div class="tabla__header mt-5  d-flex  justify-content-between ">
                        <p><span class="">Responsable del paciente </span></p>
                        @if ($responsable == null)
                            <a href="" class="btn btn-success ">Agregar</a>
                        @else
                            <a href="#" class="btn btn-warning">Editar</a>
                        @endif


                    </div>

                    <div class="bg-white rounded-3 p-3 shadow ">
                        <div class="row">
                            @if ($responsable == null)
                                <p>No tiene un responsable registrado</p>
                            @else
                                <form>
                                    <fieldset disabled>

                                        <div class="row">
                                            <div class="mb-3 col-12 col-md">
                                                <label for="disabledTextInput" class="form-label">Nombre</label>
                                                <input type="text" id="disabledTextInput" class="form-control"
                                                    placeholder="{{ $responsable->name }} {{ $responsable->apellido_paterno }} {{ $responsable->apellido_materno }}">
                                            </div>
                                            <div class="mb-3 col-md">
                                                <label for="disabledTextInput" class="form-label">Parentesco</label>
                                                <input type="text" id="disabledTextInput" class="form-control"
                                                    placeholder="{{ $responsable->parentesco }}">
                                            </div>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="disabledTextInput" class="form-label">Telefono</label>
                                            <input type="text" id="disabledTextInput" class="form-control"
                                                placeholder="{{ $responsable->telefono }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="disabledTextInput" class="form-label">Email</label>
                                            <input type="text" id="disabledTextInput" class="form-control"
                                                placeholder="{{ $responsable->email }}">
                                        </div>


                                    </fieldset>
                                </form>
                            @endif

                        </div>


                    </div>
                </div>



            </div>
        </div>

    </div>
@endsection
