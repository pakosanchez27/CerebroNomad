@extends('layouts.app')

@section('titulo')
    home
@endsection

@section('contenido')
    <div class="contenedor__panel--contenido vista__home d-flex flex-column ">
        <div class="vista__home--portada p-5 d-flex justify-content-between align-items-center text-white">
            <div class="bienvenida-texto">
                <h2>Bienvenido <span>Administrador</span></h2>
                <p class="fw-light">¿Cómo estás el día de hoy?</p>
            </div>
            <div class="hora-clima" id="hora-clima">
                <p id="hora" class="hora"></p>

            </div>

        </div>
        <div class="vista__home--contenido  ">
            <div class="contenedor__cards ">
                <button class="card card-opcRapida shadow" data-bs-toggle="modal" data-bs-target="#AgregarColaborador">
                    <div class="card-opcRapida__img azul">
                        <img src="{{ asset('img/roles.png') }}" alt="icono Rol">
                    </div>
                    <div class="card-opcRapida__texto">
                        <h4>Nuevo <span>Colaborador</span></h4>
                        <p>Añade un Nuevo Colaborador</p>
                    </div>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="AgregarColaborador" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-3" id="exampleModalLabel">Agrega de forma rapida un colaborador
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="index.html" method="POST" class="p-3">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Nombre:</label>
                                        <input type="text" class="form-control" id="recipient-name" name="nombre">
                                    </div>
                                    <div class="row">
                                        <div class=" col mb-3">
                                            <label for="recipient-name" class="col-form-label">Primer Apellido:</label>
                                            <input type="text" class="form-control " id="recipient-name"
                                                name="apellido_paterno">
                                        </div>
                                        <div class=" col mb-3">
                                            <label for="recipient-name" class="col-form-label">Segundo Apellido</label>
                                            <input type="text" class="form-control" id="recipient-name"
                                                name="apellido_materno">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="message-text" class="col-form-label">Email:</label>
                                        <input type="email" class="form-control" id="message-text"></input>
                                    </div>
                                    <div class="mb-5">
                                        <label for="message-text" class="col-form-label">Rol:</label>
                                        <select class="form-select form-select-lg mb-3" aria-label="Large select example"
                                            name="rol">
                                            <option selected disabled>Selecciona el Rol del colaborador</option>
                                            <option value="admin">Administrador</option>
                                            <option value="analista">Analista</option>
                                            <option value="editor">Editor</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer row">
                                        <input type="button" class="col btn btn-danger border-0 w-100 "
                                            data-bs-dismiss="modal" value="Cerrar">
                                        <input type="submit" class="col btn btn-primary border-0 w-100 " value="Crear">
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

                <button class="card card-opcRapida shadow" data-bs-toggle="modal" data-bs-target="#AgregarVendedor">
                    <div class="card-opcRapida__img naranja">
                        <img src="{{ asset('img/vendedores.png') }}" alt="icono Vendedores">
                    </div>
                    <div class="card-opcRapida__texto">
                        <h4>Nuevo <span>Vendedor</span></h4>
                        <p>Da de alta a un nuevo vendedor</p>
                    </div>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="AgregarVendedor" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Recipient:</label>
                                        <input type="text" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="message-text" class="col-form-label">Message:</label>
                                        <textarea class="form-control" id="message-text"></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Send message</button>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="" class="card card-opcRapida shadow ">
                    <div class="card-opcRapida__img verde">
                        <img src="{{ asset('img/aseguradoras.png') }}" alt="icono Rol">
                    </div>
                    <div class="card-opcRapida__texto">
                        <h4>Nuevo <span>Aseguradora</span></h4>
                        <p>Agrega una aseguradora </p>
                    </div>
                </a>
                <a href="" class="card card-opcRapida shadow ">
                    <div class="card-opcRapida__img morado">
                        <img src="{{ asset('img/doctores.png') }}" alt="icono Aseguradora">
                    </div>
                    <div class="card-opcRapida__texto">
                        <h4>Nuevo <span>Doctor</span></h4>
                        <p>Da de alta a un doctor colaborador nuevo</p>
                    </div>
                </a>
            </div>
            <div class="contenedor__tablas ">
                <div class="contenedor__tablas--principal">
                    <div class="tabla">
                        <div class="tabla__header">
                            <p><span>Colaboradores </span> <a href="#"> Ver mas</a></p>
                        </div>
                        <div class="tabla__body">
                            <table class="table text-center  table-striped table-hover  ">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellidos</th>
                                        <th scope="col">Correo</th>
                                        <th scope="col">rol</th>
                                        <th scope="col"></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>admin</td>
                                        <td>
                                            <a href="#" class="btn btn-warning">Editar</a>
                                            <a href="#" class="btn btn-danger">Eliminar</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>admin</td>
                                        <td>
                                            <a href="#" class="btn btn-warning">Editar</a>
                                            <a href="#" class="btn btn-danger">Eliminar</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>admin</td>
                                        <td>
                                            <a href="#" class="btn btn-warning">Editar</a>
                                            <a href="#" class="btn btn-danger">Eliminar</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="contenedor__tablas--secundaria">
                    <h1>secundario</h1>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
