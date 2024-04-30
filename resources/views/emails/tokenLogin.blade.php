<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Verificación de inicio de sesión en NomadGenetics</title>
<style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        p {
            margin-bottom: 15px;
        }
        .token {
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            padding: 10px;
            border: 2px solid #007bff;
            border-radius: 5px;
            background-color: #f0f8ff;
            color: #007bff;
            margin-top: 15px;
            margin-bottom: 30px;
        }
        .signature {
            font-style: italic;
            text-align: center;
        }
</style>
</head>
<body>
<div class="container">
<h1>Verificación de inicio de sesión en NomadGenetics</h1>
<p>Estimado usuario,</p>
<p>Hemos detectado un intento de inicio de sesión en su cuenta de NomadGenetics. Para garantizar la seguridad de su cuenta, requerimos su confirmación antes de permitir el acceso.</p>
<p>Si está intentando iniciar sesión, por favor ingrese el siguiente token de verificación:</p>
<div class="token">{{$token}}</div>
<p>Este token es válido por un tiempo limitado para garantizar su seguridad. Una vez que haya ingresado el token correctamente, se le permitirá acceder a su cuenta.</p>
<p>Sin embargo, si no ha intentado iniciar sesión recientemente, le recomendamos que ignore este correo electrónico. Si sospecha que su cuenta puede estar en riesgo, por favor póngase en contacto con nuestro equipo de soporte de inmediato.</p>
<p>Además, si cree que su contraseña ha sido comprometida, le sugerimos que la cambie inmediatamente. Puede hacerlo siguiendo el enlace "Olvidé mi contraseña" en la página de inicio de sesión de NomadGenetics.</p>
<p class="signature">Gracias por su cooperación y compromiso con la seguridad de su cuenta.<br>Atentamente,<br>El equipo de seguridad de NomadGenetics</p>
</div>
</body>
</html>
