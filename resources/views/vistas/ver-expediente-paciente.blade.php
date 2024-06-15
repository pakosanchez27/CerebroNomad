@extends('layouts.app')

@section('titulo')
    Pacientes - Expediente
@endsection

@section('contenido')
<div class="custom-container">
    <div class="container">
        <div class="profile-header">
            <div class="header-left">
                <h2>{{ $paciente->name }} {{ $paciente->apellido_paterno }} {{ $paciente->apellido_materno }}</h2>
                <p>{{ $paciente->sexo }}, {{ \Carbon\Carbon::parse($paciente->fecha_nacimiento)->age }} años</p>
            </div>
            <div class="header-right">
                <h4>Fecha de nacimiento:</h4>
                <p>{{ \Carbon\Carbon::parse($paciente->fecha_nacimiento)->format('d \\d\\e F \\d\\e\\l Y') }}</p>
            </div>
        </div>
        <div class="profile-info">
            <div>
                <p><strong>Numero de Telefono</strong><br>{{ $paciente->telefono }}</p><br>
                <p><strong>Tipo de Identificacion</strong><br>{{ $paciente->tipo_identificacion }}</p>
            </div>
            <div>
                <p><strong>Email</strong><br>{{ $paciente->email }}</p>
            </div>
        </div>
        <div class="profile-info profile-color">
            <div>
                <p><strong>Tipo de Sangre</strong><br>{{ $paciente->tipo_sangre }}</p>
            </div>
            <div>
                <strong>Descripcion medica</strong><br> 
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#textareaCollapse" aria-expanded="false" aria-controls="textareaCollapse">
                    Mostrar/ocultar
                </button>
                <div class="collapse" id="textareaCollapse">
                    <div class="card card-body">
                        <textarea class="form-control" rows="5" readonly>{{ $paciente->descripcion_medica }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <h2 class="mb-5 mt-5">Pruebas medicas</h2>
        <table role="grid">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Estatus</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pruebas as $prueba)
                <tr>
                    <td>{{ $prueba->nombre }}</td>
                    <td>{{ $prueba->descripcion }}</td>
                    <td>
                        @if ($prueba->estado === 'completado')
                        <button class="btn btn-success">Completado</button>
                        @elseif ($prueba->estado === 'pendiente')
                        <button class="btn btn-danger">Pendiente</button>
                        @else
                        <button class="btn btn-info">Asignar hora</button>
                        @endif
                    </td>
                    <td>${{ number_format($prueba->precio, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection