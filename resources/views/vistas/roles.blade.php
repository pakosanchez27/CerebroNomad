@extends('layouts.app')

@section('titulo')
    Roles
@endsection

@section('contenido')
    <div class="contenido-roles">
        <div class="contenido-roles__texto">
            <h2>Colaboradores</h2>
            <p>En esta sección podrás ver, editar y agregar a los roles de los colaboradores de la empresa.</p>
        </div>
        <div class="contenido-roles__tablas row gap-5  ">
            <div class="formulario-roles col-12  col-md-4">
                <div class="formulario-roles__header text-center tabla__header">
                    <P><span> Agregar Colaborador </span></P>
                </div>
                <form action="{{ route('roles.store') }}" method="POST" class="p-3 " id="form-rol">
                    @csrf
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label ">Nombre:</label>
                        <input type="text" class="form-control" id="name" name="name">

                    </div>
                    <div class=" col mb-3">
                        <label for="recipient-name" class="col-form-label">Primer Apellido:</label>
                        <input type="text" class="form-control " id="apellido_paterno" name="apellido_paterno">

                    </div>
                    <div class=" col mb-3">
                        <label for="recipient-name" class="col-form-label">Segundo Apellido</label>
                        <input type="text" class="form-control" id="recipient-name" name="apellido_materno">

                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email"></input>

                    </div>
                    <div class="mb-5">
                        <label for="message-text" class="col-form-label">Rol:</label>
                        <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="rol"
                            id="rol">
                            <option selected disabled value="">Selecciona el Rol del colaborador</option>
                            <option value="Admin">Administrador</option>
                            <option value="Analista">Analista</option>
                            <option value="Editor">Editor</option>
                        </select>

                    </div>
                    <div class="modal-footer row">

                        <input type="submit" class="col btn btn-secondary border-0 w-100  " disabled id="btnSubmit"
                            value="Crear">
                    </div>
                </form>
                @if (@session('message'))
                    <script>
                        alert('{{ session('message') }}');
                    </script>
                @endif
            </div>
            <div class="tabla-roles col-12 col-md-7">
                <div class="tabla tabla-colaboradores col   ">
                    <div class="tabla__header ">
                        <p><span>Colaboradores </span></p>
                    </div>

                    <div class="tabla__cards">
                        @foreach ($users as $user)
                            <div
                                class=" card card-rol d-flex flex-row justify-content-between align-items-center gap-5  px-3 py-3 ">

                                <div class="img-rol ">
                                    <img src="{{ asset('img/usuario.svg') }}" alt="" width="100px">
                                </div>

                                <div class="card-rol__datos w-75  ">
                                    <p>{{ $user->name }} {{ $user->apellido_paterno }} </p>
                                    <span class="h5">{{ $user->email }}</span>
                                </div>

                                <div class="badge bg-success w-25  ">
                                    <span>{{ $rol }}</span>
                                </div>

                                <div class="acciones d-flex flex-column gap-2    ">
                                    <a href="{{ route('roles.edit', $user->id) }}" class="btn btn-warning"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white"
                                            class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd"
                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                        </svg></a>

                                    <form action="{{ route('roles.destroy', $user->id) }}" method="POST" class="deleteForm m-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="white" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                <path
                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                            </svg>
                                        </button>
                                    </form>



                                    <form id="resetPasswordForm{{ $user->id }}" class="resetPasswordForm"
                                        action="{{ route('roles.resetPassword', $user->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-info">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="white" class="bi bi-key-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2M2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                                            </svg>
                                        </button>
                                    </form>



                                </div>



                            </div> <!-- card -->
                        @endforeach
                    </div>

                </div>
            </div>



        </div>
    </div>
    @if (@session('email'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('email') }}',
            });
        </script>
    @endif
    @if (@session('susses'))
        <script>
            Swal.fire({
                icon: 'exito',
                title: 'Registro Correcto',
                text: '{{ session('susses') }}',
            });
        </script>
    @endif
    @if (@session('editado'))
        <script>
            Swal.fire({

                icon: "success",
                title: "Colaborador actualizado correctamente",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif
    @if (@session('eliminado'))
        <script>
            Swal.fire({

                icon: "success",
                title: "Colaborador eliminado correctamente",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif
    @if (@session('reset'))
        <script>
            Swal.fire({

                icon: "success",
                title: "Contraseña restablecida correctamente",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif
@endsection


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
