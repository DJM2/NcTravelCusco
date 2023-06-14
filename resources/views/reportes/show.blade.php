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

<body id="content">
    <div class="container">
        <div class="row linea">
            <div class="col-12">
                <img src="{{ asset('img/logo-colores.png') }}" alt="">
                <div class="info">
                    <span>+51 921 136 755</span>
                    <span>info@nctravelcusco.com</span>
                    <span>www.nctravelcusco.com</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-3 paquete">
                <h2>{{ $reporte->tour }}</h2>
                <span>Para: {{ $reporte->nombre }}</span>
            </div>
            <div class="col-12 datos">
                <div class="row">
                    <div class="col-12">
                        <h3>Datos generales:</h3>
                    </div>
                    <div class="col-12">

                        <div class="row bordes">
                            <div class="col-4">
                                <p>Nombre: <span>{{ $reporte->nombre }}</span></p>
                            </div>
                            <div class="col-4">
                                <p>Email: <span>{{ $reporte->email }}</span></p>
                            </div>
                            <div class="col-4">
                                <p>Número de pasajeros: <span>{{ $reporte->numPaxs }}</span></p>
                            </div>
                            <div class="col-4">
                                <p>Inicio: <span>{{ date('d \d\e F \d\e Y', strtotime($reporte->fechaInicio)) }}</span></p>
                            </div>
                            <div class="col-4">
                                <p>Briefing: <span>{{ date('d \d\e F \d\e Y', strtotime($reporte->briefing)) }}</span></p>
                            </div>
                            
                            <div class="col-4">
                                <p>Tipo de Moneda: <span>Dólares (USD)</span></p>
                            </div>
                            <div class="col-4">
                                <p>Total do pacote: <span>{{ $reporte->precio }}</span></p>
                            </div>
                            <div class="col-4">
                                <p>Adiantamento: <span>{{ $reporte->adelanto }}</span></p>
                            </div>
                            <div class="col-4">
                                <p>Restante: <span id="resto"></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <h3>Detalhe de passageiros:</h3>
                        </div>
                        <div class="col-12">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Nome completo</th>
                                        <th scope="col">Passaporte</th>
                                        <th scope="col">Nacionalidade</th>
                                        <th scope="col">Alimentando</th>
                                        <th>Data de nascimiento</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($reporte->pasajeros as $pasajero): ?>
                                    <tr>
                                        <td> {{ $pasajero->nombre }}</td>
                                        <td>{{ $pasajero->numeroPasaporte }}</td>
                                        <td>{{ $pasajero->nacionalidad }}</td>
                                        <td> {{ $pasajero->alimentacion }}</td>
                                        <td>{{date('d-m-Y', strtotime($pasajero->fechaNacimiento)) }}</td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row sinborde">
                        <div class="col-12">
                            <h3> Detalhes do roteiro:</h3>
                        </div>
                        <div class="col-12">
                            <h1>{{ $reporte->tour }}</h1>
                            {!! $reporte->detalles !!}
                        </div>
                    </div>
                </div>
            </div>
            <script>
                var precio = {{ $reporte->precio }};
                var adelanto = {{ $reporte->adelanto }};
                var resto = precio - adelanto;
                document.getElementById("resto").textContent = resto;
            </script>
            <a class="pdf-button pdf-only" onclick="generatePDF()" title="Imprimir PDF">
                <i class="fas fa-print"></i>
              </a>
            {{-- <button class="pdf-button" onclick="generatePDF()">Generar PDF</button> --}}
        </div>

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
