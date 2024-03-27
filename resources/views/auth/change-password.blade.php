<style>
    * {
        box-sizing: border-box;
    }

    *:focus {
        outline: none;
    }

    body {
        font-family: Arial;
        background-color: #3498DB;
        padding: 50px;
    }

    .container {
        width: 30%;
        display: flex;
        justify-content: center align-items: center;
        margin: 0 auto;
    }

    .login {
        margin: 20px auto;
        width: 400px;
    }

    .login-screen {
        background-color: #FFF;
        padding: 20px;
        border-radius: 5px
    }

    .app-title {
        text-align: center;
        color: #777;
    }

    .login-form {
        text-align: center;


    }

    .control-group {
        margin-bottom: 10px;
    }

    input {
        text-align: center;
        background-color: #ECF0F1;
        border: 2px solid transparent;
        border-radius: 3px;
        font-size: 16px;
        font-weight: 200;
        padding: 10px 0;
        width: 250px;
        transition: border .5s;
    }

    input:focus {
        border: 2px solid #3498DB;
        box-shadow: none;
    }

    .btn {
        border: 2px solid transparent;
        background: #3498DB;
        color: #ffffff;
        font-size: 16px;
        line-height: 25px;
        padding: 10px 0;
        text-decoration: none;
        text-shadow: none;
        border-radius: 3px;
        box-shadow: none;
        transition: 0.25s;
        display: block;
        width: 250px;
        margin: 0 auto;
    }

    .btn:hover {
        background-color: #2980B9;
    }

    .login-link {
        font-size: 12px;
        color: #444;
        display: block;
        margin-top: 12px;
    }
</style>

<body>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-md-4">
                <div class="login-screen">
                    <div class="app-title text-center">
                        <h1>Cambia tu contraseña</h1>
                    </div>

                    <div class="login-form">
                        <form action="{{ route('actualizar-contraseña', auth()->id()) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <input type="password" class="form-control login-field" placeholder="Nuevo Password"
                                    id="password" name="password">
                                <label class="login-field-icon fui-user" for="new-password"></label>
                               
                            </div>

                            <div class="mb-3">
                                <input type="password" class="form-control login-field" placeholder="Repetir Password"
                                    id="password_confirmation" name="password_confirmation" required>
                                <label class="login-field-icon fui-lock" for="password_confirmation"></label>
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Cambiar</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
