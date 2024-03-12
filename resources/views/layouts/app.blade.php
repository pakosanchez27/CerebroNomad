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

</head>

<body>
    <div class="contenedor">
        <div class="contenedor__menu ">

            {{-- logo --}}

            <a href="{{route('home')}}" class="logo-menu text-white pointer-event ">
                <p>Cerebro<span>Nomad</span></p>
            </a>

            {{-- Perfil --}}
            <div class="card-perfil d-flex justify-content-center align-items-center mt-5 gap-3">
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
                    <li class="{{ $path === 'home' ? 'active' : '' }}">
                        <a href="{{route('home')}}">
                            <img src="{{ asset('img/home.png') }}" alt="">
                            Home
                        </a>
                    </li>
                    <li class="{{ $path === 'finanzas' ? 'active' : '' }}">
                        <a href="{{route('finanzas')}}">
                            <img src="{{ asset('img/finansas.png') }}" alt="">
                            Finanzas
                        </a>
                    </li>
                    <li class="{{ $path === 'pacientes' ? 'active' : '' }}">
                        <a href="{{route('pacientes')}}">
                            <img src="{{ asset('img/paciente.png') }}" alt="">
                            Pacientes
                        </a>
                    </li>
                    <li class="{{ $path === 'roles' ? 'active' : '' }}">
                        <a href="{{route('roles')}}">
                            <img src="{{ asset('img/roles.png') }}" alt="">
                            Roles
                        </a>
                    </li>
                    <li class="{{ $path === 'aseguradoras' ? 'active' : '' }}">
                        <a href="{{route('aseguradoras')}}">
                            <img src="{{ asset('img/aseguradoras.png') }}" alt="">
                            Aseguradoras
                        </a>
                    </li>
                    <li class="{{ $path === 'pacientes' ? 'vendedores' : '' }}">
                        <a href="{{route('vendedores')}}">
                            <img src="{{ asset('img/vendedores.png') }}" alt="">
                            Vendedores
                        </a>
                    </li>
                    <li class="{{ $path === 'doctores' ? 'active' : '' }}">
                        <a href="{{route('doctores')}}">
                            <img src="{{ asset('img/doctores.png') }}" alt="">
                            Doctores
                        </a>
                    </li>
                    <li class="{{ $path === 'pruebas' ? 'active' : '' }}">
                        <a href="{{route('pruebas')}}">
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
                            <div class="card-perfil d-flex justify-content-center align-items-center gap-3">
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
                                    <li class="{{ $path === 'home' ? 'active' : '' }}">
                                        <a href="{{route('home')}}">
                                            <img src="{{ asset('img/home.png') }}" alt="">
                                            Home
                                        </a>
                                    </li>
                                    <li class="{{ $path === 'finanzas' ? 'active' : '' }}">
                                        <a href="{{route('finanzas')}}">
                                            <img src="{{ asset('img/finansas.png') }}" alt="">
                                            Finanzas
                                        </a>
                                    </li>
                                    <li class="{{ $path === 'pacientes' ? 'active' : '' }}">
                                        <a href="{{route('pacientes')}}">
                                            <img src="{{ asset('img/paciente.png') }}" alt="">
                                            Pacientes
                                        </a>
                                    </li>
                                    <li class="{{ $path === 'roles' ? 'active' : '' }}">
                                        <a href="{{route('roles')}}">
                                            <img src="{{ asset('img/roles.png') }}" alt="">
                                            Roles
                                        </a>
                                    </li>
                                    <li class="{{ $path === 'aseguradoras' ? 'active' : '' }}">
                                        <a href="{{route('aseguradoras')}}">
                                            <img src="{{ asset('img/aseguradoras.png') }}" alt="">
                                            Aseguradoras
                                        </a>
                                    </li>
                                    <li class="{{ $path === 'pacientes' ? 'vendedores' : '' }}">
                                        <a href="{{route('vendedores')}}">
                                            <img src="{{ asset('img/vendedores.png') }}" alt="">
                                            Vendedores
                                        </a>
                                    </li>
                                    <li class="{{ $path === 'doctores' ? 'active' : '' }}">
                                        <a href="{{route('doctores')}}">
                                            <img src="{{ asset('img/doctores.png') }}" alt="">
                                            Doctores
                                        </a>
                                    </li>
                                    <li class="{{ $path === 'pruebas' ? 'active' : '' }}">
                                        <a href="{{route('pruebas')}}">
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
                                <a href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                                    </svg>

                                    Cerrar Sesión
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="contenedor__panel--contenido">
               @yield('contenido')
            </div>
        </div>
</body>


</html>
