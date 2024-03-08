<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.scss')

    <title>Document</title>
</head>

<body class="fondo">
    <div class="contenedor">
        <div class="contenedor__form">
            <div class="logo-login ">
                <a href="#"><img src="{{ asset('img/logo.png') }}" alt="Logo"></a>
            </div>
            <div action="" class="formulario-login">
                <h1 class="w-75 fw-normal mb-3 ">Bienvenido a Cerebro Nomad.</h1>
                <p>Ingresa tus datos para iniciar sesión en cerebro Nomad. </p>
                <form action="{{ route('login') }}" class="mt-5 formulario" method="POST" novalidate>
                    @csrf
                    @if (session('status'))
                        <div class="alert alert-danger h4">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Correo Electronico</label>
                            <input type="email"
                                class="form-control form-control-lg @error('email') border-danger   @enderror "
                                id="exampleFormControlInput1" name="email" placeholder="name@example.com"
                                value="{{ old('email') }}">
                            @error('email')
                                <span
                                    class="text-danger h5 @error('email') border-danger   @enderror ">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Contraseña</label>
                            <input type="password"
                                class="form-control form-control-lg  @error('email') border-danger   @enderror  "
                                id="exampleFormControlInput1" placeholder="********" name="password">
                            @error('password')
                                <span class="text-danger h5">{{ $message }}</span>
                            @enderror
                        </div>



                        <div class="form-check text-start my-5">
                            <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                            <label class="form-check-label h5" for="flexCheckDefault">
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
        <div class="contenedor__img">

        </div>
    </div>
</body>

</html>
