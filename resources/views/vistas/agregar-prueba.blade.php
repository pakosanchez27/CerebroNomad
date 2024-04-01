@extends('layouts.app')

@section('titulo')
    Pruebas - agregar
@endsection

@section('contenido')
    <div class="aseguradora-agregar-contenido p-5 d-flex justify-content-center ">

        <div class="formulario-agregar w-50">
            <div class="tabla__header   ">
                <p><span class="">Agregar Prueba </span></p>
            </div>
            <form action="{{ route('pruebas.store') }}" method="POST" class="p-4 shadow  rounded-2 " novalidate>
                @csrf
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('nombre') }}">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Descripcion</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" id="description">{{ old('description') }}</textarea>
                    </div>

                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Precio</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}">
                    @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-success  ">Agregar</button>

            </form>
        </div>


    </div>
@endsection
