@extends('layouts.app')

@section('titulo')
    Pacientes - detalles
@endsection

@section('contenido')
<div class="contenido-perfilpaciente bg-secondary-subtle h-100  ">
    <div class="row">
        <div class="contenido-perfilPaciente__cardPerfil col-12 col-lg-4 p-5">
            <div class="card cardPaciente">
                <div class="row">
                    <div class="imgPaciente">
                        @if ($paciente->sexo === 'Mujer')
                            <img src="{{asset('img/PerfilMujer.png')}}" alt="">
                        @else
                            <img src="{{asset('img/PerfilHombre.png')}}" alt="">
                        @endif
                    </div>
                    <div class="datosPaciente">

                    </div>
                </div>
            </div>
        </div>
        <div class="contenido-perfilPaciente__datos col-12 col-lg-8">
       detalles del paciente
        </div>
    </div>
 
</div>


@endsection