@extends('layouts.app')

@section('titulo')
    Editar Colaborador
@endsection

@section('contenido')
    <div class="contenido-editar d-flex justify-content-center align-items-center mt-5 ">
        <div class="formulario-roles col-12  col-md-4">
            <div class="formulario-roles__header text-center tabla__header">
                <P><span> Edita informacion de {{ $user->name }} </span></P>
            </div>
            <form action="{{ route('roles.update', $user->id) }}" method="POST" class="p-5 bg-white shadow " novalidate>
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label ">Nombre:</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                    @error('name')
                        <div class="h5 text-danger mt-2 ">{{ $message }}</div>
                    @enderror

                </div>
                <div class=" col mb-3">
                    <label for="recipient-name" class="col-form-label">Primer Apellido:</label>
                    <input type="text" class="form-control " name="apellido_paterno"
                        value="{{ $user->apellido_paterno }}">
                    @error('apellido_paterno')
                        <div class="h5 text-danger mt-2 ">{{ $message }}</div>
                    @enderror
                </div>
                <div class=" col mb-3">
                    <label for="recipient-name" class="col-form-label">Segundo Apellido</label>
                    <input type="text" class="form-control" name="apellido_materno"
                        value="{{ $user->apellido_materno }}">



                </div>
                <div class="mb-3">
                    <label for="message-text" class="col-form-label">Email:</label>
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                    @error('email')
                        <div class="h5 text-danger mt-2 ">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="message-text" class="col-form-label">Rol:</label>
                    <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="role_id">
                        <option selected value="{{ $user->role_id }}">{{ $user->role->name }}</option>
                        <option value="1">Administrador</option>
                        <option value="3">Analista</option>
                        <option value="2">Editor</option>
                    </select>
                    @error('rol')
                        <div class="h5 text-danger mt-2 ">{{ $message }}</div>
                    @enderror
                </div>
                <div class="modal-footer row">

                    <input type="submit" class="col btn btn-secondary border-0 w-100" id="btnSubmit" value="Crear">
                </div>
            </form>
        </div>
    </div>
@endsection
