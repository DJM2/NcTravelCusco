<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h4>Correo enviado desde la página web Trilha Inca Cusco</h4>
    <table class="table table-hover" style="text-align: left">
        {{-- <thead>
            <tr>
                <th scope="col">Email:</th>
                <td>{{ $email }}</th>
            </tr>
        </thead> --}}
        <tbody>
            <tr>
                <th scope="row">Nombre:</th>
                <td>{{ $nombre }}</td>
            
            </tr>
            <tr>
                <th scope="row">Email:</th>
                <td>{{ $email }}</td>
            
            </tr>
            <tr>
                <th scope="row">Adultos:</th>
                <td>{{ $adultos }}</td>
            </tr>
            <tr>
                <th scope="row">Niños:</th>
                <td>{{ $childs }}</td>
            </tr>
            <tr>
                <th scope="row">Fecha de arrivo:</th>
                <td>{{ $date }}</td>
            </tr>
            <tr>
                <th scope="row">Teléfono:</th>
                <td>{{ $phone }}</td>
            </tr>
            <tr>
                <th scope="row">Tour:</th>
                <td>{{ $tour }}</td>
            </tr>
            <tr>
                <th scope="row">Mensaje:</th>
                <td>{{ $mensaje }}</td>
            </tr>
        </tbody>
    </table>
    <br><br><br>
    <div class="conteiner">
        <div class="col-lg-12 text-center">
            Copiryght 2023 © todos los derechos reservados | NC Travel Cusco | Hecho por DJM2
        </div>
    </div>
</body>
</html>