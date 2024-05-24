@extends('layouts.app')

@section('titulo')
    Vendedores
@endsection

@section('contenido')
    <div class="contenido-vendedores">
        <div
            class="contenido-aseguradoras__header  d-flex flex-column flex-md-row justify-content-between align-items-center p-5 ">
            <div class="contenido-roles__texto text-center text-md-start">
                <h2>Vendedores</h2>
                <p>Administra a los vendedores</p>
            </div>
            <div class="boton-agregar">
                <a href="{{ route('vendedores.create') }}"
                    class="btn btn-success text-white d-flex justify-content-center  align-items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-plus-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                    </svg>
                    <P class="">Nuevo Vendedor</P>
                </a>
            </div>
        </div>
        <div class="p-5">
            <div class="tabla__header   ">
                <p><span class="">Vendedores </span></p>
            </div>

            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Vendedor</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vendedores as $vendedor)
                            <tr class="">
                                <td class="d-flex  gap-5 p-3">
                                    <img src="{{ asset('img/usuario.svg') }}" alt="" width="40px">
                                    <div class="d-flex flex-column ">
                                        {{ $vendedor->user->name }} {{ $vendedor->user->apellido_paterno }}
                                        {{ $vendedor->user->apellido_materno }}
                                        <span class="text-success fw-normal">{{ $vendedor->zona }}</span>
                                    </div>
                                </td>
                                <td>
                                    {{ $vendedor->user->email }}
                                </td>
                                <td>
                                    {{ $vendedor->telefono }}
                                </td>


                                <td class="">
                                    <div class=" d-flex gap-4 ">
                                        <a href="{{ route('vendedores.edit', $vendedor->user->id) }}"
                                            class="btn btn-warning btn-sm ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="white" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                            </svg>
                                        </a>
                                        @if ($rol === 'admin')
                                        <form action="{{ route('vendedores.destroy', $vendedor->id) }}" method="POST" class="deleteForm">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm ">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path
                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                    <path
                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                </svg>
                                            </button>
                                        </form>
                                        @endif

                                    </div>
                                </td>



                            </tr>
                        @endforeach




                    </tbody>
                </table>
            </div>

        </div>
    </div>


    @if (@session('success'))
    <script>
        Swal.fire({
            icon: 'exito',
            title: 'Registro Correcto',
            text: '{{ session('success') }}',
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

