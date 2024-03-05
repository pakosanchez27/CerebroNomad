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
            <div action="" class="formulario-login  ">
                <h1 class="w-75 fw-normal mb-3 ">Bienvenido a Cerebro Nomad.</h1>
                <p>Ingresa tus datos para iniciar sesión en cerebro Nomad. </p>
                <form action="" class="mt-5 formulario">

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Correo Electronico</label>
                        <input type="email" class="form-control form-control-lg " id="exampleFormControlInput1"
                            placeholder="name@example.com">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Contraseña</label>
                        <input type="password" class="form-control form-control-lg " id="exampleFormControlInput1"
                            placeholder="********">
                    </div>
                    
                    
                </form>
            </div>
        </div>
        <div class="contenedor__img">
            <img src="{{ asset('img/img-login.png') }}" alt="Imagen Login">
        </div>
    </div>
</body>

</html>
