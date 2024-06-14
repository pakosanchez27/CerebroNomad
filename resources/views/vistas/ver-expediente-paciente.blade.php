@extends('layouts.app')

@section('titulo')
    Pacientes - Expediente
@endsection

@section('contenido')

<div class="container">
    <div class="profile-header">
        <div class="header-left">
            <h2>Dario Cordoba</h2>
            <p>Hombre, 19 años</p>
        </div>
        <div class="header-right">
            <h4>Fecha de nacimiento:</h4>
            <p>8 de agosto del 2024</p>
        </div>
    </div>
    <div class="profile-info">
        <div>
            <p><strong>Numero de Telefono</strong><br>55 67040480</p><br>
            <p><strong>Tipo de Identificacion</strong><br>INE</p>
        </div>
        <div>
            <p><strong>Email</strong><br>Dcordobabamos69@gmail.com</p>
        </div>
    </div>
    <div class="profile-info profile-color">
        <div>
            <p><strong>Tipo de Sangre</strong><br>O+</p>
        </div>
        <div>
           <strong>Descripcion medica</strong><br> 
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#textareaCollapse" aria-expanded="false" aria-controls="textareaCollapse">
                    Mostrar/ocultar
                </button>
            <div class="collapse" id="textareaCollapse">
                <div class="card card-body">
                    <textarea class="form-control" rows="5" readonly>asdfadewwwwwwwwwwwwwwwwwrwer</textarea>
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
            <tr>
                <td>Cancer</td>
                <td>Radiografía de los senos para detectar cáncer de mama</td>
                <td><button class="btn btn-success">Completado</button></td>
                <td>$300</td>
            </tr>
            <tr>
                <td>Cancer</td>
                <td>Radiografía de los senos para detectar cáncer de mama</td>
                <td><button class="btn btn-danger">Pendiente</button></td>
                <td>$300</td>
            </tr>
            <tr>
                <td>Cancer</td>
                <td>Radiografía de los senos para detectar cáncer de mama</td>
                <td><button class="btn btn-info">asignar hora</button></td>
                <td>$300</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection