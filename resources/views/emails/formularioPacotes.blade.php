<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Contact Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
        }
        .contenedor{
            width: 100%;
            padding: 2em;
        }

        h1 {
            color: #333;
            font-size: 22px;
        }

        p {
            margin-bottom: 10px;
        }

        span {
            color: #ff730f;
            font-weight: bold;
        }

        .pie {
            width: 100%;
            text-align: center;
            background-color: #333;
            margin-top: 2em;
        }

        .pie p {
            padding: 1em;
            color: #ffffff;
            font-weight: 500;
        }

        .pie a {
            color: #ff730f;
            text-decoration: none;
        }

        .pie a:hover {
            color: #fff;
        }

        img {
            text-align: center;
            margin: auto
        }
    </style>
</head>

<body>
    <div class="contenedor">
        <img src="img/logo-nc-travel-colores-origin.png" alt="Logo NC Travel Cusco">
        <h1>Formulario de informes desde <strong>Pacotes de viagem no Peru</strong></h1>
        <p><span>Nombre:</span> {{ $nombre }}</p>
        <p><span>Email:</span> {{ $email }}</p>
        <p><span>Telefono:</span> {{ $telefono }}</p>
        <p><span>Fecha:</span> {{ $fecha }}</p>
        <p><span>Nacionalidad:</span> {{ $nacionalidad }}</p>
        <p><span>Interés:</span> {{ $interes }}</p>
        <p><span>Mensaje:</span> {{ $mensaje }}</p>
    </div>

    <div class="pie">
        <p>Todos los derechos reservados © 2023 | NcTravel Cusco | Hecho por <a
                href="https://www.facebook.com/DjmWebMaster" target="_blank">DJM2</a></p>
    </div>
</body>

</html>
