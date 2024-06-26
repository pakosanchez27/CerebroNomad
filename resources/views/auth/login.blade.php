<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.scss')
    <link rel="icon" href="{{asset('img/icon.png')}}" type="image/png">
    <title>Cerebro Nomad - Login</title>
</head>

<body class="fondo">
    <div class="contenedor-login">
        <div class="contenedor-login__form">
            <div class="logo-login  ">
                <a href="#"><img src="{{ asset('img/logo.png') }}" alt="Logo" width="200px"></a>
            </div>
            <div action="" class="formulario-login mt-5
            ">
                <div class="formulario-login__texto">
                    <h1 class="w-75 fw-normal mb-3 ">Bienvenido a Cerebro Nomad.</h1>
                    <p>Ingresa tus datos para iniciar sesión en cerebro Nomad. </p>
                </div>

                <form action="{{ route('login') }}" class="mt-5 formulario" method="POST" novalidate>
                    @csrf
                    @if (session('status'))
                        <div class="alert alert-danger h4">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="form-label">Correo Electronico</label>
                            <input type="email"
                                class="form-control form-control-lg @error('email') border-danger   @enderror "
                                id="exampleFormControlInput1" name="email"
                                value="{{ old('email') }}">
                            @error('email')
                                <span
                                    class="text-danger h5 @error('email') border-danger   @enderror ">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="form-label">Contraseña</label>
                            <input type="password"
                                class="form-control form-control-lg  @error('email') border-danger   @enderror  "
                                id="exampleFormControlInput1" name="password">
                            @error('password')
                                <span class="text-danger h5">{{ $message }}</span>
                            @enderror
                        </div>



                        <div class="form-check mb-5 ">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label" for="remember">
                                Recordar contraseña
                            </label>
                        </div>

                        <button class="btn btn-primary w-100  p-2 border-0 shadow " type="submit">Iniciar
                            Sesion</button>
                        <div class="text-center mt-5 ">
                            <a href="#" class=" text-black-50  ">¿Olvidaste tu contraseña?</a>
                        </div>
                </form>
            </div>
        </div>
        <div class="contenedor-login__img">

        </div>
    </div>

    @if(session('token'))
    <!-- Modal para ingresar el token -->
    <div id="tokenModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Token de Confirmación</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('verificar-token') }}" method="POST">
                        @csrf
                        <label for="tokenLogin" class="form-label">Ingresa el token que se envió a tu correo</label>
                        <input type="text" id="tokenLogin" name="tokenLogin" class="form-control">
                        <div class="d-flex gap-3 mt-3">
                            <input type="submit" value="Enviar" class="btn btn-success">
                            <a href="{{route('reenviarToken')}}" class="btn btn-info">Reenviar</a>
                        </div>
                    </form>     
                </div>
            </div>
        </div>
    </div>
@endif

@if(session('errorToken'))
    <!-- Modal para mostrar el error de token incorrecto -->
    <div id="errorModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Token de Confirmación</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('verificar-token') }}" method="POST">
                        @csrf
                        <label for="tokenLogin" class="form-label">Ingresa el token que se envió a tu correo</label>
                        <input type="text" id="tokenLogin" name="tokenLogin" class="form-control">
                        <span class="alert text-danger">Token incorrecto</span>
                        <div class="d-flex gap-3 mt-3">
                            <input type="submit" value="Enviar" class="btn btn-success">
                            <a href="{{route('reenviarToken')}}" class="btn btn-info">Reenviar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif

@if (@session('reenviartoken'))

        <!-- Modal para mostrar el error de token incorrecto -->
        <div id="errorModal" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Token de Confirmación</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('verificar-token') }}" method="POST">
                            @csrf
                            <label for="tokenLogin" class="form-label">Ingresa el token que se envió a tu correo</label>
                            <input type="text" id="tokenLogin" name="tokenLogin" class="form-control">
                            <span class="alert text-success ">Token reenviado</span>
                            <div class="d-flex gap-3 mt-3">
                                <input type="submit" value="Enviar" class="btn btn-success">
                                <a href="{{route('reenviarToken')}}" class="btn btn-info">Reenviar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endif

<script>
    // Mostrar el modal correspondiente si existe un token o un error de token en la sesión
    @if(session('token'))
        var tokenModal = document.getElementById('tokenModal');
        tokenModal.style.display = "block";
    @elseif(session('errorToken'))
        var errorModal = document.getElementById('errorModal');
        errorModal.style.display = "block";
    @elseif(session('reenviartoken'))
        var errorModal = document.getElementById('errorModal');
        errorModal.style.display = "block";
    @endif

    // Cerrar el modal al hacer clic en la "x"
    var closeButtons = document.querySelectorAll(".modal .btn-close");
    closeButtons.forEach(function(button) {
        button.addEventListener("click", function() {
            var modal = button.closest(".modal");
            modal.style.display = "none";
        });
    });

    // Cerrar el modal al hacer clic fuera de él
    window.onclick = function(event) {
        if (event.target.classList.contains("modal")) {
            event.target.style.display = "none";
        }
    };
</script>

</body>

</html>
