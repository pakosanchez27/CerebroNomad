<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.scss')
    @vite('resources/js/app.js')
    @vite('resources/js/APIs/clima.js')
    <title>CerebroNomad - @yield('titulo')</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    @php
        $path = request()->route()->getName();
        $rol = auth()->user()->role->name;
    @endphp


</head>

<body>
    <div class="contenedor">
        <div class="contenedor__menu ">

            {{-- logo --}}

            <a href="{{ route('home') }}" class="logo-menu text-white pointer-event ">
                <p>Cerebro<span>Nomad</span></p>
            </a>

            {{-- Perfil --}}
            <div class="card-perfil d-flex justify-content-center align-items-center mt-5 gap-3">
                <div class="card-perfil__img">
                    <img src="{{ asset('img/usuario.svg') }}" alt="foto de perfil">
                </div>
                <div class="card-perfil__datos">
                    <p class=" fw-bold ">{{ auth()->user()->name }} {{ auth()->user()->apellido_paterno }}</p>
                    <span class=" fw-light ">{{ $rol }}</span>
                </div>
            </div>

            {{-- Menu --}}
            <div class="menu-lateral mt-5">
                <ul class=" list-unstyled ">
                    <li class="{{ $path === 'home' ? 'active' : '' }}">
                        <a href="{{ route('home') }}" class="d-flex align-items-center  gap-2 ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-house-fill" viewBox="0 0 16 16">
                                <path
                                    d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
                                <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z" />
                            </svg>
                            <p>Home</p>
                        </a>
                    </li>
                    @if ($rol == 'admin')
                        <li class="{{ $path === 'finanzas' ? 'active' : '' }}">
                            <a href="{{ route('finanzas') }}" class="d-flex align-items-center  gap-2 ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-wallet-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M1.5 2A1.5 1.5 0 0 0 0 3.5v2h6a.5.5 0 0 1 .5.5c0 .253.08.644.306.958.207.288.557.542 1.194.542s.987-.254 1.194-.542C9.42 6.644 9.5 6.253 9.5 6a.5.5 0 0 1 .5-.5h6v-2A1.5 1.5 0 0 0 14.5 2z" />
                                    <path
                                        d="M16 6.5h-5.551a2.7 2.7 0 0 1-.443 1.042C9.613 8.088 8.963 8.5 8 8.5s-1.613-.412-2.006-.958A2.7 2.7 0 0 1 5.551 6.5H0v6A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5z" />
                                </svg>
                                <p>Finanzas</p>
                            </a>
                        </li>
                        <li class="{{ $path === 'roles' ? 'active' : '' }}">
                            <a href="{{ route('roles') }}" class="d-flex align-items-center  gap-2 ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                                </svg>
                                <p>Colaboradores</p>
                            </a>
                        </li>
                    @endif

                    <li class="{{ $path === 'pacientes' ? 'active' : '' }}">
                        <a href="{{ route('pacientes') }}" class="d-flex align-items-center  gap-2 ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-person-fill-add" viewBox="0 0 16 16">
                                <path
                                    d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                <path
                                    d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4" />
                            </svg>
                            <p>Pacientes</p>
                        </a>
                    </li>
                    @if ($rol === 'admin' || $rol === 'editor')
                        <li class="{{ $path === 'aseguradoras' ? 'active' : '' }}">
                            <a href="{{ route('aseguradoras') }}" class="d-flex align-items-center  gap-2 ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-hospital-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M6 0a1 1 0 0 0-1 1v1a1 1 0 0 0-1 1v4H1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h6v-2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5V16h6a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1h-3V3a1 1 0 0 0-1-1V1a1 1 0 0 0-1-1zm2.5 5.034v1.1l.953-.55.5.867L9 7l.953.55-.5.866-.953-.55v1.1h-1v-1.1l-.953.55-.5-.866L7 7l-.953-.55.5-.866.953.55v-1.1zM2.25 9h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 2 9.75v-.5A.25.25 0 0 1 2.25 9m0 2h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5a.25.25 0 0 1 .25-.25M2 13.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25zM13.25 9h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5a.25.25 0 0 1 .25-.25M13 11.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25zm.25 1.75h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5a.25.25 0 0 1 .25-.25" />
                                </svg>
                                <p>Aseguradoras</p>
                            </a>
                        </li>
                        <li class="{{ $path === 'vendedores' ? 'vendedores' : '' }}">
                            <a href="{{ route('vendedores') }}" class="d-flex align-items-center  gap-2 ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                                    class="bi bi-person-vcard" viewBox="0 0 16 16">
                                    <path
                                        d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4m4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5M9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8m1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5" />
                                    <path
                                        d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96q.04-.245.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 1 1 12z" />
                                </svg>
                                <p>Vendedores</p>
                            </a>
                        </li>
                        <li class="{{ $path === 'doctores' ? 'active' : '' }}">
                            <a href="{{ route('doctores') }}" class="d-flex align-items-center  gap-2 ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-file-earmark-person-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0m2 5.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-.245S4 12 8 12s5 1.755 5 1.755" />
                                </svg>
                                <p>Doctores</p>
                            </a>
                        </li>
                        <li class="{{ $path === 'pruebas' ? 'active' : '' }}">
                            <a href="{{ route('pruebas') }}" class="d-flex align-items-center  gap-2 ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-clipboard-data-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z" />
                                    <path
                                        d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zM10 8a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0zm4-3a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0v-3a1 1 0 0 1 1-1" />
                                </svg>
                                <p>Pruebas</p>
                            </a>
                        </li>
                    @endif

                </ul>

            </div>
            <div class="copy post text-center ">
                <p class="h5">© 2021 CerebroNomad</p>
            </div>
        </div>
        <div class="contenedor__panel">
            <div class="contenedor__panel--header">
                <div class="logo-panel">
                    <a class="nav-mobil mx-2" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                        aria-controls="offcanvasExample">
                        <img src="{{ asset('img/nav.png') }}" alt="">
                    </a>
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
                        aria-labelledby="offcanvasExampleLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasExampleLabel">CerebroNomad</h5>
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>

                        </div>
                        <div class="offcanvas-body">
                            {{-- Perfil --}}
                            <div class="card-perfil d-flex justify-content-center align-items-center gap-3">
                                <div class="card-perfil__img">
                                    <img src="{{ asset('img/usuario.svg') }}" alt="foto de perfil">
                                </div>
                                <div class="card-perfil__datos">
                                    <p class=" fw-bold ">{{ auth()->user()->name }}
                                        {{ auth()->user()->apellido_paterno }}</p>
                                    <span class=" fw-light ">{{ $rol }}</span>
                                </div>
                            </div>
                            {{-- Menu --}}
                            <div class="menu-lateral mt-5">
                                <ul class=" list-unstyled ">
                                    <li class="{{ $path === 'home' ? 'active' : '' }}">
                                        <a href="{{ route('home') }}" class="d-flex align-items-center  gap-2 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
                                                <path
                                                    d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z" />
                                            </svg>
                                            <p>Home</p>
                                        </a>
                                    </li>
                                    @if ($rol == 'admin')
                                        <li class="{{ $path === 'finanzas' ? 'active' : '' }}">
                                            <a href="{{ route('finanzas') }}"
                                                class="d-flex align-items-center  gap-2 ">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-wallet-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M1.5 2A1.5 1.5 0 0 0 0 3.5v2h6a.5.5 0 0 1 .5.5c0 .253.08.644.306.958.207.288.557.542 1.194.542s.987-.254 1.194-.542C9.42 6.644 9.5 6.253 9.5 6a.5.5 0 0 1 .5-.5h6v-2A1.5 1.5 0 0 0 14.5 2z" />
                                                    <path
                                                        d="M16 6.5h-5.551a2.7 2.7 0 0 1-.443 1.042C9.613 8.088 8.963 8.5 8 8.5s-1.613-.412-2.006-.958A2.7 2.7 0 0 1 5.551 6.5H0v6A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5z" />
                                                </svg>
                                                <p>Finanzas</p>
                                            </a>
                                        </li>
                                        <li class="{{ $path === 'roles' ? 'active' : '' }}">
                                            <a href="{{ route('roles') }}" class="d-flex align-items-center  gap-2 ">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-people-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                                                </svg>
                                                <p>Colaboradores</p>
                                            </a>
                                        </li>
                                    @endif

                                    <li class="{{ $path === 'pacientes' ? 'active' : '' }}">
                                        <a href="{{ route('pacientes') }}" class="d-flex align-items-center  gap-2 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-person-fill-add"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                                <path
                                                    d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4" />
                                            </svg>
                                            <p>Pacientes</p>
                                        </a>
                                    </li>
                                    @if ($rol === 'admin' || $rol === 'editor')
                                        <li class="{{ $path === 'aseguradoras' ? 'active' : '' }}">
                                            <a href="{{ route('aseguradoras') }}"
                                                class="d-flex align-items-center  gap-2 ">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-hospital-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M6 0a1 1 0 0 0-1 1v1a1 1 0 0 0-1 1v4H1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h6v-2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5V16h6a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1h-3V3a1 1 0 0 0-1-1V1a1 1 0 0 0-1-1zm2.5 5.034v1.1l.953-.55.5.867L9 7l.953.55-.5.866-.953-.55v1.1h-1v-1.1l-.953.55-.5-.866L7 7l-.953-.55.5-.866.953.55v-1.1zM2.25 9h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5A.25.25 0 0 1 2 9.75v-.5A.25.25 0 0 1 2.25 9m0 2h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5a.25.25 0 0 1 .25-.25M2 13.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25zM13.25 9h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5a.25.25 0 0 1 .25-.25M13 11.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25zm.25 1.75h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5a.25.25 0 0 1 .25-.25" />
                                                </svg>
                                                <p>Aseguradoras</p>
                                            </a>
                                        </li>
                                        <li class="{{ $path === 'vendedores' ? 'vendedores' : '' }}">
                                            <a href="{{ route('vendedores') }}"
                                                class="d-flex align-items-center  gap-2 ">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="white" class="bi bi-person-vcard" viewBox="0 0 16 16">
                                                    <path
                                                        d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4m4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5M9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8m1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5" />
                                                    <path
                                                        d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96q.04-.245.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 1 1 12z" />
                                                </svg>
                                                <p>Vendedores</p>
                                            </a>
                                        </li>
                                        <li class="{{ $path === 'doctores' ? 'active' : '' }}">
                                            <a href="{{ route('doctores') }}"
                                                class="d-flex align-items-center  gap-2 ">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-file-earmark-person-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0m2 5.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-.245S4 12 8 12s5 1.755 5 1.755" />
                                                </svg>
                                                <p>Doctores</p>
                                            </a>
                                        </li>
                                        <li class="{{ $path === 'pruebas' ? 'active' : '' }}">
                                            <a href="{{ route('pruebas') }}"
                                                class="d-flex align-items-center  gap-2 ">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-clipboard-data-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z" />
                                                    <path
                                                        d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zM10 8a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0zm4-3a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0v-3a1 1 0 0 1 1-1" />
                                                </svg>
                                                <p>Pruebas</p>
                                            </a>
                                        </li>
                                    @endif

                                </ul>

                            </div>
                            <div class="copy post text-center ">
                                <p class="h5">© 2021 CerebroNomad</p>
                            </div>
                        </div>
                    </div>
                    <img src="{{ asset('img/logo.png') }}" alt="" width="80px">
                </div>
                <div class="perfil-menu">
                    <div class="dropdown">
                        <button class=" border-0 " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('img/usuario.svg') }}" alt="">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg>
                            </span>
                        </button>
                        <ul class="menu-perfil dropdown-menu p-3 ">
                            <li>

                                <a href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>

                                    Perfil
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 0 1 1.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.559.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.894.149c-.424.07-.764.383-.929.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 0 1-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.398.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 0 1-.12-1.45l.527-.737c.25-.35.272-.806.108-1.204-.165-.397-.506-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.108-1.204l-.526-.738a1.125 1.125 0 0 1 .12-1.45l.773-.773a1.125 1.125 0 0 1 1.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>

                                    Configuración
                                </a>
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class=" border-0 text-danger p-0">
                                        <p class="h4"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                                            </svg>
                                            Cerrar Sesión</p>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="vista__home--portada p-5 d-flex justify-content-between align-items-center text-white">
                <div class="bienvenida-texto">
                    <h2>Bienvenido <span>{{ auth()->user()->name }}</span></h2>
                    <p class="fw-light">¿Cómo estás el día de hoy?</p>
                </div>
                <div class="hora-clima" id="hora-clima">
                    <p id="hora" class="hora"></p>

                </div>

            </div>
            @yield('contenido')

        </div>



        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>
