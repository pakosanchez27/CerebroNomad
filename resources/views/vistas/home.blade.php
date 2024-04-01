@extends('layouts.app')

@section('titulo')
    Home
@endsection

@section('contenido')
    <div class="contenedor__panel--contenido vista__home d-flex flex-column ">

        <div class="vista__home--contenido  ">
            <div class="contenedor__cards ">
                <button class="card card-opcRapida shadow borde-azul" data-bs-toggle="modal"
                    data-bs-target="#AgregarColaborador">
                    <div class="card-opcRapida__img azul">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white"
                            class="bi bi-people" viewBox="0 0 16 16">
                            <path
                                d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4" />
                        </svg>

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
                            <div class="modal-header tabla__header text-white ">
                                <h1 class="modal-title fs-3" id="exampleModalLabel">Agrega de forma rapida un colaborador
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('roles.store') }}" method="POST" class="p-3" id="form-rol">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Nombre:</label>
                                        <input type="text" class="form-control" id="name" name="name">

                                    </div>
                                    <div class="row">
                                        <div class=" col mb-3">
                                            <label for="recipient-name" class="col-form-label">Primer Apellido:</label>
                                            <input type="text" class="form-control " id="apellido_paterno"
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
                                        <input type="email" class="form-control" id="email" name="email"></input>

                                    </div>
                                    <div class="mb-5">
                                        <label for="message-text" class="col-form-label">Rol:</label>
                                        <select class="form-select form-select-lg mb-3" aria-label="Large select example"
                                            name="rol" id="rol">
                                            <option selected disabled value="">Selecciona el Rol del colaborador
                                            </option>
                                            <option value="Admin">Administrador</option>
                                            <option value="Analista">Analista</option>
                                            <option value="Editor">Editor</option>
                                        </select>

                                    </div>
                                    <div class="modal-footer row">
                                        <input type="button" class="col btn btn-danger border-0 w-100 "
                                            data-bs-dismiss="modal" value="Cerrar">
                                        <input type="submit" class="col btn btn-secondary border-0 w-100  " disabled
                                            id="btnSubmit" value="Crear">
                                    </div>
                                </form>
                                @if (@session('message'))
                                    <script>
                                        alert('{{ session('message') }}');
                                    </script>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>

                <button class="card card-opcRapida shadow borde-naranja" data-bs-toggle="modal"
                    data-bs-target="#AgregarVendedor">
                    <div class="card-opcRapida__img naranja ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white"
                            class="bi bi-person-vcard" viewBox="0 0 16 16">
                            <path
                                d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4m4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5M9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8m1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5" />
                            <path
                                d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96q.04-.245.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 1 1 12z" />
                        </svg>
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

                <a href="" class="card card-opcRapida shadow borde-verde"  data-bs-toggle="modal"
                data-bs-target="#AgregarAseguradora">
                    <div class="card-opcRapida__img verde">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white"
                            class="bi bi-hospital" viewBox="0 0 16 16">
                            <path
                                d="M8.5 5.034v1.1l.953-.55.5.867L9 7l.953.55-.5.866-.953-.55v1.1h-1v-1.1l-.953.55-.5-.866L7 7l-.953-.55.5-.866.953.55v-1.1zM13.25 9a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25zM13 11.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25zm.25 1.75a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25zm-11-4a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5A.25.25 0 0 0 3 9.75v-.5A.25.25 0 0 0 2.75 9zm0 2a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25zM2 13.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25z" />
                            <path
                                d="M5 1a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1a1 1 0 0 1 1 1v4h3a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h3V3a1 1 0 0 1 1-1zm2 14h2v-3H7zm3 0h1V3H5v12h1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1zm0-14H6v1h4zm2 7v7h3V8zm-8 7V8H1v7z" />
                        </svg>
                    </div>
                    <div class="card-opcRapida__texto">
                        <h4>Nuevo <span>Aseguradora</span></h4>
                        <p>Agrega una aseguradora </p>
                    </div>
                </a>

                <!-- Modal -->
                <div class="modal fade" id="AgregarAseguradora" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header tabla__header text-white ">
                                <h1 class="modal-title fs-3" id="exampleModalLabel">Agrega Aseguradora</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('aseguradoras.store')}}" method="POST" class="p-4 " novalidate id="miFormulario">
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
                                    <div class="modal-footer mt-5">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="document.querySelector('#miFormulario').reset()">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Agregar</button>
                                    </div>
                            </form>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <a href="" class="card card-opcRapida shadow borde-morado">
                    <div class="card-opcRapida__img morado">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white"
                            class="bi bi-file-earmark-person-fill" viewBox="0 0 16 16">
                            <path
                                d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0m2 5.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-.245S4 12 8 12s5 1.755 5 1.755" />
                        </svg>
                    </div>
                    <div class="card-opcRapida__texto">
                        <h4>Nuevo <span>Doctor</span></h4>
                        <p>Da de alta a un doctor colaborador nuevo</p>
                    </div>
                </a>
            </div>
            <div class="contenedor__tablas  ">


                <div class="contenedor__tablas--principal row gap-5  ">
                    <div class="tabla tabla-colaboradores col-12  ">
                        <div class="tabla__header ">
                            <p><span>Colaboradores </span> <a href="{{ route('roles') }}"> Ver mas</a></p>
                        </div>

                        <div class="tabla__cards">
                            @foreach ($users as $user)
                                <div
                                    class=" card card-rol d-flex flex-row justify-content-between align-items-center gap-5 px-5 py-3 ">

                                    <div class="img-rol ">
                                        <img src="{{ asset('img/usuario.svg') }}" alt="" width="100px">
                                    </div>

                                    <div class="card-rol__datos w-75  ">
                                        <p>{{ $user->name }} {{ $user->apellido_paterno }} </p>
                                        <span class="h5">{{ $user->email }}</span>
                                    </div>

                                    <div class="badge bg-success w-25  ">
                                        <span>{{ $user->rol }}</span>
                                    </div>



                                </div> <!-- card -->
                            @endforeach
                        </div>
                    </div>
                    <div class="tabla tabla-vendedores col-12 ">
                        <div class="tabla__header">
                            <p><span>Vendedores </span> <a href="{{ route('vendedores') }}"> Ver mas</a></p>
                        </div>

                        <div class="table-responsive">

                            <table class="table table-striped ">
                                <thead>
                                    <tr>
                                        <th>Vendedor</th>
                                        <th>Email</th>
                                        <th>Telefono</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vendedores as $vendedor)
                                        <tr class="">
                                            <td class="d-flex  gap-5 p-3">
                                                <img src="{{ asset('img/usuario.svg') }}" alt="" width="40px">
                                                <div class="d-flex flex-column ">
                                                    {{ $vendedor->name }} {{ $vendedor->apellido_paterno }}
                                                    {{ $vendedor->apellido_materno }}
                                                    <span class="text-success fw-normal">{{ $vendedor->zona }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                {{ $vendedor->email }}
                                            </td>
                                            <td>
                                                {{ $vendedor->telefono }}
                                            </td>
            
            
                                          
            
            
            
                                        </tr>
                                    @endforeach
            
            
            
            
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="contenedor__tablas--secundaria ">
                    <div class="tabla tabla-Grafica ">
                        <div class="tabla__header">
                            <p><span> Ganancias </span> <a href="{{ route('finanzas') }}"> Ver mas</a></p>
                        </div>

                        <div class="tabla__body">
                            <canvas id="ventasPorMes"></canvas>


                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    </div>
    @if (@session('success'))
        <script>
            alert('{{ session('success') }}');
        </script>
    @endif
@endsection
