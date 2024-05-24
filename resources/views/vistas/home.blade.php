@extends('layouts.app')

@section('titulo')
    Home
@endsection

@section('contenido')
    <div class="contenedor__panel--contenido vista__home d-flex flex-column ">

        <div class="vista__home--contenido  ">
            @if ($rol === 'admin')
                <div class="contenedor-resumen row  gap-5  gap-lg-0  p-5  ">

                    <div class="contenedor-resumen__cards row gap-5 justify-content-center   ">
                        <div
                            class="contenedor-resumen__cards--card d-flex flex-column justify-content-between gap-4 p-3 card col-12 col-md-6 col-lg ">
                            <h3 class="fw-bold fs-4 ">Venta del Mes</h3>
                            <p class=" fs-1 fw-bold ">$10,250 <span class=" fs-4 text-success  ">+2.5%</span></p>
                            <p class="fs-5 text-secondary ">Venta hasta el dia de hoy @php
                                echo date('d-m-Y');
                            @endphp</p>
                        </div> <!-- card -->

                        <div
                            class="contenedor-resumen__cards--card d-flex flex-column justify-content-between gap-4 p-3 card   card col-12 col-md-6 col-lg">
                            <h3 class="fw-bold fs-4 ">Total pacientes</h3>
                            <p class=" fs-1 fw-bold ">{{ $totalPacientes }} <span
                                    class=" fs-4 text-success  ">pacientes</span>
                            </p>
                            <p class="fs-5 text-secondary ">Pacientes hasta @php
                                echo date('d-m-Y');
                            @endphp</p>
                        </div> <!-- card -->
                        <div
                            class="contenedor-resumen__cards--card d-flex flex-column justify-content-between gap-4 p-3 card  card col-12 col-md-6 col-lg">
                            <h3 class="fw-bold fs-4 ">Doctores</h3>
                            <p class=" fs-1 fw-bold ">{{ $totalDoctores }} <span
                                    class=" fs-4 text-success  ">Doctores</span>
                            </p>
                            <p class="fs-5 text-secondary ">Doctores afiliados hasta @php
                                echo date('d-m-Y');
                            @endphp</p>
                        </div> <!-- card -->

                        <div
                            class="contenedor-resumen__cards--card d-flex flex-column justify-content-between gap-4 p-3 card  card col-12 col-md-6 col-lg">
                            <h3 class="fw-bold fs-4 ">Vendedores</h3>
                            <p class=" fs-1 fw-bold ">{{ $totalVendedores }} <span
                                    class=" fs-4 text-success  ">Vendedores</span></p>
                            <p class="fs-5 text-secondary ">Venta hasta el dia de hoy @php
                                echo date('d-m-Y');
                            @endphp</p>
                        </div> <!-- card -->
                    </div>

                </div>
            @endif


            <div class="contenedor__cards ">

                @if ($rol === 'admin')
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
                @endif
                @if ($rol === 'admin' || $rol === 'editor')
                    <!-- Modal -->
                    <div class="modal fade" id="AgregarColaborador" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header tabla__header text-white ">
                                    <h1 class="modal-title fs-3" id="exampleModalLabel">Agrega de forma rapida un
                                        colaborador
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
                    <!-- Modal -->
                    <div class="modal fade" id="AgregarColaborador" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header tabla__header text-white ">
                                    <h1 class="modal-title fs-3" id="exampleModalLabel">Agrega de forma rapida un
                                        colaborador
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
                                            <div class=" col mb-3">
                                                <label for="recipient-name" class="col-form-label">Segundo Apellido</label>
                                                <input type="text" class="form-control" id="recipient-name"
                                                    name="apellido_materno">

                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label">Email:</label>
                                            <input type="email" class="form-control" id="email"
                                                name="email"></input>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label">Email:</label>
                                            <input type="email" class="form-control" id="email"
                                                name="email"></input>

                                        </div>
                                        <div class="mb-5">
                                            <label for="message-text" class="col-form-label">Rol:</label>
                                            <select class="form-select form-select-lg mb-3"
                                                aria-label="Large select example" name="rol" id="rol">
                                                <option selected disabled value="">Selecciona el Rol del colaborador
                                                </option>
                                                <option value="Admin">Administrador</option>
                                                <option value="Analista">Analista</option>
                                                <option value="Editor">Editor</option>
                                            </select>
                                        </div>
                                        <div class="mb-5">
                                            <label for="message-text" class="col-form-label">Rol:</label>
                                            <select class="form-select form-select-lg mb-3"
                                                aria-label="Large select example" name="rol" id="rol">
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
                                <div class="tabla__header   ">
                                    <p><span class="">Agregar Vendedor </span></p>
                                </div>
                                <form action="{{ route('vendedores.store') }}" method="POST"
                                    class="p-4 shadow  rounded-2 " novalidate id="miFormulario">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre"
                                            value="{{ old('nombre') }}">
                                        @error('nombre')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class=" row">
                                        <div class="mb-3 col-12 col-md-6">
                                            <label for="nombre" class="form-label">Apellido Paterno</label>
                                            <input type="text" class="form-control" id="apellido_paterno"
                                                name="apellido_paterno" value="{{ old('apellido_paterno') }}">
                                            @error('apellido_paterno')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-12 col-md-6">
                                            <label for="nombre" class="form-label">Apellido Materno</label>
                                            <input type="text" class="form-control" id="apellido_materno"
                                                name="apellido_materno" value="{{ old('apellido_materno') }}">
                    <!-- Modal -->
                    <div class="modal fade" id="AgregarVendedor" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="tabla__header   ">
                                    <p><span class="">Agregar Vendedor </span></p>
                                </div>
                                <form action="{{ route('vendedores.store') }}" method="POST"
                                    class="p-4 shadow  rounded-2 " novalidate id="miFormulario">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre"
                                            value="{{ old('nombre') }}">
                                        @error('nombre')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class=" row">
                                        <div class="mb-3 col-12 col-md-6">
                                            <label for="nombre" class="form-label">Apellido Paterno</label>
                                            <input type="text" class="form-control" id="apellido_paterno"
                                                name="apellido_paterno" value="{{ old('apellido_paterno') }}">
                                            @error('apellido_paterno')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-12 col-md-6">
                                            <label for="nombre" class="form-label">Apellido Materno</label>
                                            <input type="text" class="form-control" id="apellido_materno"
                                                name="apellido_materno" value="{{ old('apellido_materno') }}">

                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nombre" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ old('email') }}">
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class=" row">
                                        <div class="mb-3 col-12 col-md-6">
                                            <label for="nombre" class="form-label">Télefono</label>
                                            <input type="tel" class="form-control" id="telefono" name="telefono"
                                                value="{{ old('telefono') }}">
                                            @error('telefono')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-12 col-md-6">
                                            <label for="Zona">Zona designada</label>
                                            <select id="zona" name="zona" class="form-select form-select-lg">
                                                <option selected disabled>Selecciona una zona</option>
                                                <option value="Aguascalientes">Aguascalientes</option>
                                                <option value="Baja California">Baja California</option>
                                                <option value="Baja California Sur">Baja California Sur</option>
                                                <option value="Campeche">Campeche</option>
                                                <option value="Chiapas">Chiapas</option>
                                                <option value="Chihuahua">Chihuahua</option>
                                                <option value="Ciudad de México">Ciudad de México</option>
                                                <option value="Coahuila">Coahuila</option>
                                                <option value="Colima">Colima</option>
                                                <option value="Durango">Durango</option>
                                                <option value="Guanajuato">Guanajuato</option>
                                                <option value="Guerrero">Guerrero</option>
                                                <option value="Hidalgo">Hidalgo</option>
                                                <option value="Jalisco">Jalisco</option>
                                                <option value="México">México</option>
                                                <option value="Michoacán">Michoacán</option>
                                                <option value="Morelos">Morelos</option>
                                                <option value="Nayarit">Nayarit</option>
                                                <option value="Nuevo León">Nuevo León</option>
                                                <option value="Oaxaca">Oaxaca</option>
                                                <option value="Puebla">Puebla</option>
                                                <option value="Querétaro">Querétaro</option>
                                                <option value="Quintana Roo">Quintana Roo</option>
                                                <option value="San Luis Potosí">San Luis Potosí</option>
                                                <option value="Sinaloa">Sinaloa</option>
                                                <option value="Sonora">Sonora</option>
                                                <option value="Tabasco">Tabasco</option>
                                                <option value="Tamaulipas">Tamaulipas</option>
                                                <option value="Tlaxcala">Tlaxcala</option>
                                                <option value="Veracruz">Veracruz</option>
                                                <option value="Yucatán">Yucatán</option>
                                                <option value="Zacatecas">Zacatecas</option>
                                            </select>
                                            @error('zona')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nombre" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ old('email') }}">
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class=" row">
                                        <div class="mb-3 col-12 col-md-6">
                                            <label for="nombre" class="form-label">Télefono</label>
                                            <input type="tel" class="form-control" id="telefono" name="telefono"
                                                value="{{ old('telefono') }}">
                                            @error('telefono')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-12 col-md-6">
                                            <label for="Zona">Zona designada</label>
                                            <select id="zona" name="zona" class="form-select form-select-lg">
                                                <option selected disabled>Selecciona una zona</option>
                                                <option value="Aguascalientes">Aguascalientes</option>
                                                <option value="Baja California">Baja California</option>
                                                <option value="Baja California Sur">Baja California Sur</option>
                                                <option value="Campeche">Campeche</option>
                                                <option value="Chiapas">Chiapas</option>
                                                <option value="Chihuahua">Chihuahua</option>
                                                <option value="Ciudad de México">Ciudad de México</option>
                                                <option value="Coahuila">Coahuila</option>
                                                <option value="Colima">Colima</option>
                                                <option value="Durango">Durango</option>
                                                <option value="Guanajuato">Guanajuato</option>
                                                <option value="Guerrero">Guerrero</option>
                                                <option value="Hidalgo">Hidalgo</option>
                                                <option value="Jalisco">Jalisco</option>
                                                <option value="México">México</option>
                                                <option value="Michoacán">Michoacán</option>
                                                <option value="Morelos">Morelos</option>
                                                <option value="Nayarit">Nayarit</option>
                                                <option value="Nuevo León">Nuevo León</option>
                                                <option value="Oaxaca">Oaxaca</option>
                                                <option value="Puebla">Puebla</option>
                                                <option value="Querétaro">Querétaro</option>
                                                <option value="Quintana Roo">Quintana Roo</option>
                                                <option value="San Luis Potosí">San Luis Potosí</option>
                                                <option value="Sinaloa">Sinaloa</option>
                                                <option value="Sonora">Sonora</option>
                                                <option value="Tabasco">Tabasco</option>
                                                <option value="Tamaulipas">Tamaulipas</option>
                                                <option value="Tlaxcala">Tlaxcala</option>
                                                <option value="Veracruz">Veracruz</option>
                                                <option value="Yucatán">Yucatán</option>
                                                <option value="Zacatecas">Zacatecas</option>
                                            </select>
                                            @error('zona')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>



                                    <button type="submit" class="btn btn-success  ">Agregar</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                        onclick="document.querySelector('#miFormulario').reset()">Cerrar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                                    <button type="submit" class="btn btn-success  ">Agregar</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                        onclick="document.querySelector('#miFormulario').reset()">Cerrar</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <a href="" class="card card-opcRapida shadow borde-verde" data-bs-toggle="modal"
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
                    <a href="" class="card card-opcRapida shadow borde-verde" data-bs-toggle="modal"
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
                    <div class="modal fade" id="AgregarAseguradora" tabindex="-1" aria-labelledby="modal"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header tabla__header text-white ">
                                    <h1 class="modal-title fs-3" id="exampleModalLabel">Agrega Aseguradora</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('aseguradoras.store') }}" method="POST" class="p-4 "
                                        novalidate id="miFormulario">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="nombre" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre"
                                                value="{{ old('nombre') }}">
                                            @error('nombre')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="representante"
                                                class="form-label
                    <!-- Modal -->
                    <div class="modal fade" id="AgregarAseguradora" tabindex="-1" aria-labelledby="modal"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header tabla__header text-white ">
                                    <h1 class="modal-title fs-3" id="exampleModalLabel">Agrega Aseguradora</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('aseguradoras.store') }}" method="POST" class="p-4 "
                                        novalidate id="miFormulario">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="nombre" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre"
                                                value="{{ old('nombre') }}">
                                            @error('nombre')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="representante"
                                                class="form-label
                                    ">Representante</label>
                                            <input type="text" class="form-control" id="representante"
                                                name="representante" value="{{ old('representante') }}">
                                            @error('representante')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="{{ old('email') }}">
                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="telefono" class="form-label">Teléfono</label>
                                            <input type="tel" class="form-control" id="telefono" name="telefono"
                                                value="{{ old('telefono') }}">
                                            @error('telefono')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="modal-footer mt-5">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                                onclick="document.querySelector('#miFormulario').reset()">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Agregar</button>
                                        </div>
                                    </form>
                                </div>
                                            <input type="text" class="form-control" id="representante"
                                                name="representante" value="{{ old('representante') }}">
                                            @error('representante')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="{{ old('email') }}">
                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="telefono" class="form-label">Teléfono</label>
                                            <input type="tel" class="form-control" id="telefono" name="telefono"
                                                value="{{ old('telefono') }}">
                                            @error('telefono')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="modal-footer mt-5">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                                onclick="document.querySelector('#miFormulario').reset()">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Agregar</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                            </div>
                        </div>
                    </div>



                    <a href="" class="card card-opcRapida shadow borde-morado " data-bs-toggle="modal"
                        data-bs-target="#AgregarDoctor">
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
                    <a href="" class="card card-opcRapida shadow borde-morado " data-bs-toggle="modal"
                        data-bs-target="#AgregarDoctor">
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

                    <div class="modal fade" id="AgregarDoctor" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="tabla__header   ">
                                    <p><span class="">Agregar Vendedor </span></p>
                                </div>
                                <form action="{{ route('doctores.store') }}" method="POST"
                                    class="p-4 shadow  rounded-2 " novalidate>
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre"
                                            value="{{ old('nombre') }}">
                                        @error('nombre')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class=" row">
                                        <div class="mb-3 col-12 col-md-6">
                                            <label for="nombre" class="form-label">Apellido Paterno</label>
                                            <input type="text" class="form-control" id="apellido_paterno"
                                                name="apellido_paterno" value="{{ old('apellido_paterno') }}">
                                            @error('apellido_paterno')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-12 col-md-6">
                                            <label for="nombre" class="form-label">Apellido Materno</label>
                                            <input type="text" class="form-control" id="apellido_materno"
                                                name="apellido_materno" value="{{ old('apellido_materno') }}">
                    <div class="modal fade" id="AgregarDoctor" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="tabla__header   ">
                                    <p><span class="">Agregar Vendedor </span></p>
                                </div>
                                <form action="{{ route('doctores.store') }}" method="POST"
                                    class="p-4 shadow  rounded-2 " novalidate>
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre"
                                            value="{{ old('nombre') }}">
                                        @error('nombre')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class=" row">
                                        <div class="mb-3 col-12 col-md-6">
                                            <label for="nombre" class="form-label">Apellido Paterno</label>
                                            <input type="text" class="form-control" id="apellido_paterno"
                                                name="apellido_paterno" value="{{ old('apellido_paterno') }}">
                                            @error('apellido_paterno')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-12 col-md-6">
                                            <label for="nombre" class="form-label">Apellido Materno</label>
                                            <input type="text" class="form-control" id="apellido_materno"
                                                name="apellido_materno" value="{{ old('apellido_materno') }}">

                                        </div>
                                        </div>

                                    </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-3 col col-md-6">
                                            <label for="sexo" class="form-label">Sexo</label>
                                            <select class="form-select form-select-lg " id="sexo" name="sexo">
                                                <option value="M" {{ old('sexo') == 'M' ? 'selected' : '' }}>
                                                    Masculino
                                                </option>
                                                <option value="F" {{ old('sexo') == 'F' ? 'selected' : '' }}>Femenino
                                                </option>
                                            </select>
                                            @error('sexo')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-12 col-md-6">
                                            <label for="nombre" class="form-label">Email </label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="{{ old('email') }}">
                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col col-md-6">
                                            <label for="sexo" class="form-label">Sexo</label>
                                            <select class="form-select form-select-lg " id="sexo" name="sexo">
                                                <option value="M" {{ old('sexo') == 'M' ? 'selected' : '' }}>
                                                    Masculino
                                                </option>
                                                <option value="F" {{ old('sexo') == 'F' ? 'selected' : '' }}>Femenino
                                                </option>
                                            </select>
                                            @error('sexo')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-12 col-md-6">
                                            <label for="nombre" class="form-label">Email </label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="{{ old('email') }}">
                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class=" row">
                                        <div class="mb-3 col-12 col-md-6">
                                            <label for="nombre" class="form-label">Télefono</label>
                                            <input type="tel" class="form-control" id="telefono" name="telefono"
                                                value="{{ old('telefono') }}">
                                            @error('telefono')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-12 col-md-6">
                                            <label for="nombre" class="form-label">Especialidad</label>
                                            <input type="text" class="form-control" id="especialidad"
                                                name="especialidad" value="{{ old('especialidad') }}">
                                            @error('especialidad')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class=" row">
                                        <div class="mb-3 col-12 col-md-6">
                                            <label for="nombre" class="form-label">Cedula</label>
                                            <input type="text" class="form-control" id="cedula" name="cedula"
                                                value="{{ old('cedula') }}">
                                            @error('cedula')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-12 col-md-6">
                                            <label for="nombre" class="form-label">Clinia o Hospital</label>
                                            <input type="text" class="form-control" id="nombre_clinica"
                                                name="nombre_clinica" value="{{ old('nombre_clinica') }}">
                                        </div>
                                        @error('nombre_clinica')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class=" row">
                                        <div class="mb-3 col-12 col-md-6">
                                            <label for="nombre" class="form-label">Télefono</label>
                                            <input type="tel" class="form-control" id="telefono" name="telefono"
                                                value="{{ old('telefono') }}">
                                            @error('telefono')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-12 col-md-6">
                                            <label for="nombre" class="form-label">Especialidad</label>
                                            <input type="text" class="form-control" id="especialidad"
                                                name="especialidad" value="{{ old('especialidad') }}">
                                            @error('especialidad')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class=" row">
                                        <div class="mb-3 col-12 col-md-6">
                                            <label for="nombre" class="form-label">Cedula</label>
                                            <input type="text" class="form-control" id="cedula" name="cedula"
                                                value="{{ old('cedula') }}">
                                            @error('cedula')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-12 col-md-6">
                                            <label for="nombre" class="form-label">Clinia o Hospital</label>
                                            <input type="text" class="form-control" id="nombre_clinica"
                                                name="nombre_clinica" value="{{ old('nombre_clinica') }}">
                                        </div>
                                        @error('nombre_clinica')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="nombre" class="form-label">Asistente</label>
                                        <input type="text" class="form-control" id="asistente" name="asistente"
                                            value="{{ old('asistente') }}">
                                    <div class="mb-3">
                                        <label for="nombre" class="form-label">Asistente</label>
                                        <input type="text" class="form-control" id="asistente" name="asistente"
                                            value="{{ old('asistente') }}">

                                    </div>
                                    </div>

                                    <div class=" row">
                                        <div class="mb-3 col-12 col-md-6">
                                            <label for="nombre" class="form-label">Télefono Asistente</label>
                                            <input type="tel" class="form-control" id="telefono_asistente"
                                                name="telefono_asistente" value="{{ old('telefono_asistente') }}">
                                    <div class=" row">
                                        <div class="mb-3 col-12 col-md-6">
                                            <label for="nombre" class="form-label">Télefono Asistente</label>
                                            <input type="tel" class="form-control" id="telefono_asistente"
                                                name="telefono_asistente" value="{{ old('telefono_asistente') }}">

                                        </div>
                                        <div class="mb-3 col-12 col-md-6">
                                            <label for="nombre" class="form-label">Email Asistente</label>
                                            <input type="email" class="form-control" id="email_asistente"
                                                name="email_asistente" value="{{ old('email_asistente') }}">
                                        </div>
                                        <div class="mb-3 col-12 col-md-6">
                                            <label for="nombre" class="form-label">Email Asistente</label>
                                            <input type="email" class="form-control" id="email_asistente"
                                                name="email_asistente" value="{{ old('email_asistente') }}">

                                        </div>
                                    </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-success  ">Agregar</button>
                                    <button type="submit" class="btn btn-success  ">Agregar</button>

                                </form>
                            </div>
                        </div>
                    </div>
                @endif
                @if ($rol === 'vendedor')
                <div class="container-fluid p-3">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <div class="col">
                            <div class="card h-100 shadow rounded-3 border-0 bg-light">
                                <div class="card-body text-start">
                                    <h5 class="card-title mb-0">
                                        <i class="fas fa-shopping-cart fs-5 me-2 text-primary"></i> Ventas Realizadas
                                    </h5>
                                    <h1 class="display-1"><strong>0</strong><p class="card-text text-muted">Total de ventas completadas</p></h1>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 shadow rounded-3 border-0 bg-light">
                                <div class="card-body text-start">
                                    <h5 class="card-title mb-0">
                                        <i class="fas fa-user-injured fs-5 me-2 text-danger"></i> Pacientes Registrados
                                    </h5>
                                    <h1 class="display-1"><strong>0</strong><p class="card-text text-muted">Total de pacientes registrados</p></h1>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 shadow rounded-3 border-0 bg-light">
                                <div class="card-body text-start">
                                    <h5 class="card-title mb-0">
                                        <i class="fas fa-vial fs-5 me-2 text-warning"></i> Pruebas Pendientes
                                    </h5>
                                    <h1 class="display-1"><strong>0</strong><p class="card-text text-muted">Estudios pendientes de completar</p></h1>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                    
                @endif

                <body>

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

    <script>
        function redirectToPacientes() {
            window.location.href = "{{ route('pacientes') }}";
        }
    </script>
@endsection
