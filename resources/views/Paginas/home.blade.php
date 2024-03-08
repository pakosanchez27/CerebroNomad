<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.scss')
    @vite('resources/js/app.js')
    <title>CerebroNomad - Home</title>

</head>

<body>
    <div class="contenedor">
        <div class="contenedor__menu ">

            {{-- logo --}}

            <div class="logo-menu">
                <p>Cerebro<span>Nomad</span></p>
            </div>

            {{-- Perfil --}}
            <div class="card-perfil d-flex justify-content-center align-items-center mt-5 gap-5">
                <div class="card-perfil__img">
                    <img src="{{ asset('img/fotoPerfil.jpg') }}" alt="foto de perfil">
                </div>
                <div class="card-perfil__datos">
                    <p class=" fw-bold ">Juan Peres</p>
                    <span class=" fw-light ">Administrador</span>
                </div>
            </div>

            {{-- Menu --}}
            <div class="menu-lateral mt-5">
                <ul class=" list-unstyled ">
                    <li>
                        <a href="">
                            <img src="{{ asset('img/home.png') }}" alt="">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="{{ asset('img/paciente.png') }}" alt="">
                            Pacientes
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="{{ asset('img/roles.png') }}" alt="">
                            Roles
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="{{ asset('img/finansas.png') }}" alt="">
                            Finanzas
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="{{ asset('img/vendedores.png') }}" alt="">
                            Vendedores
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="{{ asset('img/doctores.png') }}" alt="">
                            Doctores
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="{{ asset('img/pruebas.png') }}" alt="">
                            Pruebas
                        </a>
                    </li>
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
                            <div class="card-perfil d-flex justify-content-center align-items-center mt-5 gap-5">
                                <div class="card-perfil__img">
                                    <img src="{{ asset('img/fotoPerfil.jpg') }}" alt="foto de perfil">
                                </div>
                                <div class="card-perfil__datos">
                                    <p class=" fw-bold ">Juan Peres</p>
                                    <span class=" fw-light ">Administrador</span>
                                </div>
                            </div>
                            {{-- Menu --}}
                            <div class="menu-lateral mt-5">
                                <ul class=" list-unstyled ">
                                    <li>
                                        <a href="">
                                            <img src="{{ asset('img/home.png') }}" alt="">
                                            Home
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <img src="{{ asset('img/paciente.png') }}" alt="">
                                            Pacientes
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <img src="{{ asset('img/roles.png') }}" alt="">
                                            Roles
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <img src="{{ asset('img/finansas.png') }}" alt="">
                                            Finanzas
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <img src="{{ asset('img/vendedores.png') }}" alt="">
                                            Vendedores
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <img src="{{ asset('img/doctores.png') }}" alt="">
                                            Doctores
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <img src="{{ asset('img/pruebas.png') }}" alt="">
                                            Pruebas
                                        </a>
                                    </li>
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
                            <img src="{{ asset('img/fotoPerfil.jpg') }}" alt="">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg>
                            </span>
                        </button>
                        <ul class="dropdown-menu ">
                            <div class="card-perfil d-flex justify-content-center align-items-center mt-5 gap-5">
                                <div class="card-perfil__img">
                                    <img src="{{ asset('img/fotoPerfil.jpg') }}" alt="foto de perfil">
                                </div>
                                <div class="card-perfil__datos">
                                    <p class=" fw-bold ">Juan Peres</p>
                                    <span class=" fw-light ">Administrador</span>
                                </div>
                            </div>
                            <li>
                                <a href="">
                                    <img src="{{ asset('img/config.png') }}" alt="" width="5px">
                                    Ajustes
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="contenedor__panel--portada">

            </div>
            <div class="contenedor__panel--contenido">

            </div>
        </div>
</body>

</html>
