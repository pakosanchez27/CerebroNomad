@extends('layouts.app')

@section('titulo')
    Aseguradoras - agregar
@endsection

@section('contenido')
    <div class="aseguradora-agregar-contenido p-5 d-flex justify-content-center ">

        <div class="formulario-agregar w-50">
            <div class="tabla__header   ">
                <p><span class="">Editar aseguradora </span></p>
            </div>
            <form action="{{ route('aseguradoras.update', $aseguradora->id) }}" method="POST" class="p-4 shadow  rounded-2 "
                novalidate>
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre"
                        value="{{ $aseguradora->name }}">
                    @error('nombre')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="representante" class="form-label
                ">Representante</label>
                    <input type="text" class="form-control" id="representante" name="representante"
                        value="{{ $aseguradora->representante }}">
                    @error('representante')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                        value="{{ $aseguradora->email }}">
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="tel" class="form-control" id="telefono" name="telefono"
                        value="{{ $aseguradora->telefono }}">
                    @error('telefono')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-warning  text-white ">Guardar cambios</button>

            </form>
        </div>


    </div>

    @if (@session('eliminado'))
        <script>
            alert('{{ session('eliminado') }}');
        </script>
    @endif
@endsection
