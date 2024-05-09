@extends('layouts.app')
@section('titulo')
    Carga Masiva
@endsection

@section('contenido')
<style>
    .card {
      border: none;
      border-radius: 20px;
      box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
      transition: box-shadow 0.3s ease-in-out;
    }

    .card:hover {
      box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
    }

    .card-body {
      padding: 20px;
    }

    .card-title {
      color: #333;
      font-weight: bold;
      text-transform: uppercase;
      font-size: 1.2rem;
    }

    input[type="file"] {
      margin-bottom: 15px;
    }

    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
      transition: background-color 0.3s ease-in-out;
    }

    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }
  </style>

    <div
        class="contenido-aseguradoras__header  d-flex flex-column flex-md-row justify-content-between align-items-center p-5 ">
        <div class="contenido-roles__texto text-center text-md-start">
            <h2>Carga Masiva</h2>
            <p>Aqui podras Importar o Exportar los datos del sistema.</p>
        </div>
    </div>

    <div class="container px-5">
        <div class="row ">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('carga-masiva.uploadPacientes') }}" method="post">
                            @csrf

                            <h5 class="card-title h3 mb-3">Importar Pacientes</h5>
                            <input type="file" class="form-control mb-3" name="filePacientes">
                            <button type="submit" class="btn btn-primary">Importar</button>
                            @error('filePacientes')
                            <div class="alert text-danger">{{ $message }}</div>
                        @enderror
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                    <form action="{{ route('carga-masiva.uploadAseguradoras') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <h5 class="card-title h3 mb-3">Importar Aseguradora</h5>
                        <input type="file" class="form-control mb-3" name="fileAseguradora">
                        <button type="submit" class="btn btn-primary">Importar</button>
                        @error('fileAseguradora')
                        <div class="alert text-danger">{{ $message }}</div>
                    @enderror
                    </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title h3 mb-3">Importar Doctores</h5>
                        <input type="file" class="form-control mb-3">
                        <button class="btn btn-primary">Importar</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title h3 mb-3">Importar Pruebas</h5>
                        <input type="file" class="form-control mb-3">
                        <button class="btn btn-primary">Importar</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title h3 mb-3 ">Importar Colaboradores</h5>
                        <input type="file" class="form-control mb-3">
                        <button class="btn btn-primary">Importar</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title h3 mb-3 ">Importar Vendedores</h5>
                        <input type="file" class="form-control mb-3">
                        <button class="btn btn-primary">Importar</button>
                    </div>
                </div>
            </div>
        </div>
    @endsection
