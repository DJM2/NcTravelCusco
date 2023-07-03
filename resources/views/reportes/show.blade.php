<html>

<head>
    <title>Paquete turistico para {{ $reporte->nombre }}</title>
    <link rel="icon" href="{{ asset('img/nc-travel-favicon.ico') }}" />
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/pdf.css') }}">

</head>

<body>
    <div class="container">
        <div class="row linea">
            <div class="col-12">
                <div class="image-container">
                    <img src="https://trilhaincacuzco.com/img/portada-reportes.png" width="100%" alt="">
                </div>
                <div style="text-align: center;">
                    <span style="margin-left: 1em;color: #f17200;font-weight: 600;font-size: 13px;">+51 984 606
                        757</span>
                    <span
                        style="margin-left: 1em;color: #f17200; font-weight: 600;font-size: 13px;">info@nctravelcusco.com</span>
                    <span
                        style="margin-left: 1em; color: #f17200; font-weight: 600; font-size: 13px;">www.nctravelcusco.com</span>
                </div>
            </div>
            <div class="col-12 mt-3">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div style="text-align: center; padding-top: 1em; padding-bottom: 1em;">
                <h2 style="position: relative;">
                    {{ $reporte->tour }}
                    <span
                        style="position: absolute; content: ''; display: block; width: 100px; height: 2px; background-color: #f17302; margin: auto; bottom: -10px; left: 0; right: 0;"></span>
                </h2>
                <span>Para: {{ $reporte->nombre }}</span>
            </div>
            <div class="col-12 datos">
                <div class="row">
                    <div class="col-12">
                        <h3 style="color:#f17200">Datos generales:</h3>
                    </div>
                    <div class="col-12" style="display: flex; flex-wrap: wrap;">
                        <div class="bordes" style="width: 100%; display: flex; flex-wrap: wrap;">
                            <div class="col-4"
                                style="width: 33.33%; border-bottom: 1px solid grey; margin-bottom: 0.4em;">
                                <p style="font-weight: bold; border-left: 3px solid #f17200; padding-left: 0.5em;">
                                    Nome:
                                    <span style="font-weight: 400">{{ $reporte->nombre }}</span>
                                </p>
                            </div>
                            <div class="col-4"
                                style="width: 33.33%; border-bottom: 1px solid grey; margin-bottom: 0.4em;">
                                <p style="font-weight: bold; border-left: 3px solid #f17200; padding-left: 0.5em;">
                                    Email: <span style="font-weight: 400">{{ $reporte->email }}</span>
                                </p>
                            </div>
                            <div class="col-4"
                                style="width: 33.33%; border-bottom: 1px solid grey; margin-bottom: 0.4em;">
                                <p style="font-weight: bold; border-left: 3px solid #f17200; padding-left: 0.5em;">
                                    Telefone:
                                    <span style="font-weight: 400">{{ $reporte->numero }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div style="display: flex;flex-wrap: wrap;">
                        <div class="col-4" style="width: 33.33%; border-bottom: 1px solid grey; margin-bottom: 0.4em;">
                            <p style="font-weight: bold; border-left: 3px solid #f17200; padding-left: 0.5em;">
                                Começo do passeio:
                                <span
                                    style="font-weight: 400">{{ date('d \d\e F \d\e Y', strtotime($reporte->fechaInicio)) }}</span>
                            </p>
                        </div>
                        <div class="col-4" style="width: 33.33%; border-bottom: 1px solid grey; margin-bottom: 0.4em;">
                            <p style="font-weight: bold; border-left: 3px solid #f17200; padding-left: 0.5em;">
                                Briefing:
                                <span
                                    style="font-weight: 400">{{ date('d \d\e F \d\e Y', strtotime($reporte->briefing)) }}</span>
                            </p>
                        </div>
                        <div class="col-4" style="width: 33.33%; border-bottom: 1px solid grey; margin-bottom: 0.4em;">
                            <p style="font-weight: bold; border-left: 3px solid #f17200; padding-left: 0.5em;">
                                Tipo de moeda:
                                <span style="font-weight: 400">Dólares (USD)</span>
                            </p>
                        </div>
                    </div>
                    <div style="display: flex;flex-wrap: wrap;">
                        <div class="col-4" style="width: 33.33%; border-bottom: 1px solid grey; margin-bottom: 0.4em;">
                            <p style="font-weight: bold; border-left: 3px solid #f17200; padding-left: 0.5em;">
                                Total do pacote:
                                <span style="font-weight: 400">{{ $reporte->precio }}</span>
                            </p>
                        </div>
                        <div class="col-4" style="width: 33.33%; border-bottom: 1px solid grey; margin-bottom: 0.4em;">
                            <p style="font-weight: bold; border-left: 3px solid #f17200; padding-left: 0.5em;">
                                Adiantamento:
                                <span style="font-weight: 400">{{ $reporte->adelanto }}</span>
                            </p>
                        </div>
                        <div class="col-4" style="width: 33.33%; border-bottom: 1px solid grey; margin-bottom: 0.4em;">
                            <p style="font-weight: bold; border-left: 3px solid #f17200; padding-left: 0.5em;">
                                Restante:
                                <span style="font-weight: 400">{{ $reporte->precio - $reporte->adelanto }}</span>
                            </p>
                        </div>
                    </div>
                    <div style="display: flex;flex-wrap: wrap;">
                        <div class="col-4" style="width: 33.33%; border-bottom: 1px solid grey; margin-bottom: 0.4em;">
                            <p style="font-weight: bold; border-left: 3px solid #f17200; padding-left: 0.5em;">
                                Nº de passageiros:
                                <span style="font-weight: 400">{{ $reporte->numPaxs }}</span>
                            </p>
                        </div>
                        <div class="col-4" style="width: 33.33%; border-bottom: 1px solid grey; margin-bottom: 0.4em;">
                            <p style="font-weight: bold; border-left: 3px solid #f17200; padding-left: 0.5em;">
                                Começo do passeio:
                                <span
                                    style="font-weight: 400">{{ date('d \d\e F \d\e Y', strtotime($reporte->llegada)) }}
                                </span>
                            </p>
                        </div>
                        <div class="col-4" style="width: 33.33%; border-bottom: 1px solid grey; margin-bottom: 0.4em;">
                            <p style="font-weight: bold; border-left: 3px solid #f17200; padding-left: 0.5em;">
                                Começo do passeio:
                                <span
                                    style="font-weight: 400">{{ date('d \d\e F \d\e Y', strtotime($reporte->salida)) }}</span>
                            </p>
                        </div>
                    </div>

                    @if ($reporte->pasajeros->isNotEmpty())
                        <div class="row mt-4" style="width: 100%">
                            <div class="col-12">
                                <h3 style="color: #f17200">Detalhe de passageiros:</h3>
                            </div>
                            <div class="col-12" style="width: 100%;">
                                <table class="table table-hover" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th scope="col"
                                                style="text-align: left; border-bottom: 1px solid rgb(218, 218, 218)">
                                                Nome completo</th>
                                            <th scope="col"
                                                style="text-align: left; border-bottom: 1px solid rgb(218, 218, 218)">
                                                Passaporte</th>
                                            <th scope="col"
                                                style="text-align: left; border-bottom: 1px solid rgb(218, 218, 218)">
                                                Nacionalidade</th>
                                            <th scope="col"
                                                style="text-align: left; border-bottom: 1px solid rgb(218, 218, 218)">
                                                Alimentando</th>
                                            <th style="text-align: left;">Data de nascimiento</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($reporte->pasajeros as $pasajero): ?>
                                        <tr>
                                            <td style="text-align: left; border-bottom: 1px solid rgb(218, 218, 218)">
                                                {{ $pasajero->nombre }}</td>
                                            <td style="text-align: left; border-bottom: 1px solid rgb(218, 218, 218)">
                                                {{ $pasajero->numeroPasaporte }}</td>
                                            <td style="text-align: left; border-bottom: 1px solid rgb(218, 218, 218)">
                                                {{ $pasajero->nacionalidad }}</td>
                                            <td style="text-align: left; border-bottom: 1px solid rgb(218, 218, 218)">
                                                @if ($pasajero->alimentacion == 'vegano')
                                                    Vegan@
                                                @elseif($pasajero->alimentacion == 'no_vegano')
                                                    No vegan@
                                                @endif
                                            </td>
                                            <td style="text-align: left; border-bottom: 1px solid rgb(218, 218, 218)">
                                                {{ date('d-m-Y', strtotime($pasajero->fechaNacimiento)) }}</td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif

                    @if ($reporte->trenes->isNotEmpty())
                        <div class="row mt-4">
                            <div class="col-12">
                                <h3 style="color: #f17200">Detalhe de trenes:</h3>
                            </div>
                            <div class="col-12" style="width: 100%">
                                <table class="table table-hover" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th scope="col"
                                                style="text-align: left; border-bottom: 1px solid rgb(218, 218, 218)">
                                                Ruta</th>
                                            <th scope="col"
                                                style="text-align: left; border-bottom: 1px solid rgb(218, 218, 218)">
                                                Compañía</th>
                                            <th scope="col"
                                                style="text-align: left; border-bottom: 1px solid rgb(218, 218, 218)">
                                                Servicio</th>
                                            <th scope="col"
                                                style="text-align: left; border-bottom: 1px solid rgb(218, 218, 218)">
                                                Fecha</th>
                                            <th scope="col"
                                                style="text-align: left; border-bottom: 1px solid rgb(218, 218, 218)">
                                                Hora</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reporte->trenes as $tren)
                                            <tr>
                                                <td style="border-bottom: 1px solid rgb(218, 218, 218)">
                                                    {{ $tren->ruta }}</td>
                                                <td style="border-bottom: 1px solid rgb(218, 218, 218)">
                                                    {{ $tren->compania }}</td>
                                                <td style="border-bottom: 1px solid rgb(218, 218, 218)">
                                                    {{ $tren->servicio }}</td>
                                                <td style="border-bottom: 1px solid rgb(218, 218, 218)">
                                                    {{ $tren->fecha }}</td>
                                                <td style="border-bottom: 1px solid rgb(218, 218, 218)">
                                                    {{ $tren->hora }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                    @if ($reporte->hoteles->isNotEmpty())
                        <div class="row mt-4 mb-2">
                            <div class="col-12">
                                <h3 style="color: #f17200">Detalles de hoteles:</h3>
                            </div>
                            <div class="col-12" style="width: 100%">
                                <table class="table table-hover" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th scope="col"
                                                style="text-align: left; border-bottom: 1px solid rgb(218, 218, 218)">
                                                Hotel</th>
                                            <th scope="col"
                                                style="text-align: left; border-bottom: 1px solid rgb(218, 218, 218)">
                                                Lugar</th>
                                            <th scope="col"
                                                style="text-align: left; border-bottom: 1px solid rgb(218, 218, 218)">
                                                Acomodación</th>
                                            <th scope="col"
                                                style="text-align: left; border-bottom: 1px solid rgb(218, 218, 218)">
                                                Fecha de ingreso</th>
                                            <th scope="col"
                                                style="text-align: left; border-bottom: 1px solid rgb(218, 218, 218)">
                                                Fecha de salida</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reporte->hoteles as $hotel)
                                            <tr>
                                                <td style="border-bottom: 1px solid rgb(218, 218, 218)">
                                                    {{ $hotel->hotel }}</td>
                                                <td style="border-bottom: 1px solid rgb(218, 218, 218)">
                                                    {{ $hotel->lugar }}</td>
                                                <td style="border-bottom: 1px solid rgb(218, 218, 218)">
                                                    {{ $hotel->acomodacion }}</td>
                                                <td style="border-bottom: 1px solid rgb(218, 218, 218)">
                                                    {{ $hotel->fechaIngreso }}</td>
                                                <td style="border-bottom: 1px solid rgb(218, 218, 218)">
                                                    {{ $hotel->fechaSalida }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                    <div class="row sinborde mt-4">
                        <div class="col-12">
                            <h3 style="color: #f17200"> Detalhes do roteiro:</h3>
                        </div>
                        <div class="col-12">
                            <h1>{{ $reporte->tour }}</h1>
                            {!! $reporte->detalles !!}
                        </div>
                    </div>
                </div>
            </div>
            <a class="pdf-button pdf-only" onclick="generatePDF()" title="Imprimir PDF">
                <i class="fas fa-print"></i>
            </a>
        </div>
        <form action="{{ route('enviar.correo', $reporte->id) }}" method="POST">
            @csrf
            <button class="btnCorreo" type="submit" title="Enviar correio"><i class="fa fa-envelope"></i></button>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


        <script>
            function generatePDF() {
                window.print();
                document.title = originalTitle;
                document.querySelector('button').style.display = 'block';
                window.location.reload();
            }
        </script>
</body>

</html>
