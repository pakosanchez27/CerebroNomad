@extends('layouts.app')

@section('titulo')
    Aseguradoras - agregar
@endsection

@section('contenido')
    <div class="aseguradora-agregar-contenido p-5 d-flex justify-content-center ">

        <div class="formulario-agregar w-50">
            <div class="tabla__header   ">
                <p><span class="">Agregar aseguradora </span></p>
            </div>
            <form action="{{route('aseguradoras.store')}}" method="POST" class="p-4 shadow  rounded-2 " novalidate>
                @csrf
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}" >
                    @error('nombre')
                        <div class="alert alert-danger">{{ $message }}</div>
                        
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="representante" class="form-label
                ">Representante</label>
                    <input type="text" class="form-control" id="representante" name="representante" value="{{old('representante')}}">
                    @error('representante')
                    <div class="alert alert-danger">{{ $message }}</div>
                    
                @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    
                @enderror
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="tel" class="form-control" id="telefono" name="telefono" value="{{old('telefono')}}" >
                    @error('telefono')
                    <div class="alert alert-danger">{{ $message }}</div>
                    
                @enderror
                </div>
                <button type="submit" class="btn btn-success  ">Agregar</button>
     
        </form>
    </div>


    </div>
@endsection
