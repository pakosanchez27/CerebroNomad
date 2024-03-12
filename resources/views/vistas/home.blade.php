@extends('layouts.app')

@section('titulo')
    home
@endsection

@section('contenido')
<div class="vista__home">
    <div class="vista__home--portada p-5 d-flex justify-content-between align-items-center text-white">
        <div class="bienvenida-texto">
            <h2>Bienvenido <span>Administrador</span></h2>
            <p class="fw-light">¿Cómo estás el día de hoy?</p>
        </div>
        <div class="hora-clima" id="hora-clima">
            <p id="hora" class="hora"></p>
            
        </div>
    </div>
    <div class="vista__home--contenido bg-black">
        <!-- Contenido de la vista -->
    </div>
</div>
@endsection

