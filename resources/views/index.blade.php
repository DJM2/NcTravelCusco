@extends('layouts.app')
@section('titulo', 'Agência de viagens NC Travel Cusco')
@section('metas')
    <link rel="canonical" href="https://www.trilhaincacuzco.com/" />
    <meta name="description"
        content="A Trilha Inca ou  Trilha Inca Cuzco é o trekking mais famoso da América do Sul e é classificado por muitos como uma das 5 melhores trilhas do mundo. Uma experiência única e quem o fez tem a certeza de que o esforço vale a pena!" />
    <meta property="og:image"
        content="https://www.trilhaincacuzco.com/img/sliders/home/trilhaantisuyopiuraymachupicchu.jpg" />
    <!------Open Graph-------------->
    <meta property="og:title" content="Agência de viagens NC Travel Cusco" />
    <meta property="og:description"
        content="A Trilha Inca ou  Trilha Inca Cuzco é o trekking mais famoso da América do Sul e é classificado por muitos como uma das 5 melhores trilhas do mundo. Uma experiência única e quem o fez tem a certeza de que o esforço vale a pena!" />
    <meta property="og:image"
        content="https://www.trilhaincacuzco.com/img/sliders/home/trilhaantisuyopiuraymachupicchu.jpg" />
    <meta property="og:url" content="https://www.trilhaincacuzco.com/" />
    <meta property="og:type" content="website" />
    <meta name="twitter:card" content="summary" />
@endsection
@section('contenido')
    <div class="hero">
        <div class="centrado">
            <h1 class="h1-inicio">Encontre os melhores passeios para o Peru</h1>
            <a href="{{ route('peru') }}" class="btn-inicio">Pacotes Perú</a>
            <a href="{{ route('trilhas') }}" class="btn-inicio">Pacotes Trilha Inca</a>
            <a href="{{ route('mapi') }}" class="btn-inicio">Pacotes Machu Picchu</a>
            <a href="{{ route('alternativas') }}" class="btn-inicio">Pacotes Alternativas</a>
        </div>
    </div>
    <section>
        <div id="popup">
            <div id="popup-content">
                <a href="https://balsaspiuray.com/tour/paseo-laguna-piuray-con-balsa-ecologica/" target="_blank">
                    <img src="img/oferta-01.webp" alt="Balsas piuray" style="width: 100%" loading="lazy">
                </a>
                <div class="row">
                    <div class="col-lg-12">

                        <a class="btn-inicio" href="https://balsaspiuray.com/tour/paseo-laguna-piuray-con-balsa-ecologica/"
                            target="_blank">
                            Ver promoção
                        </a>
                        {{-- <a class="cerrar" onclick="cerrar()">Cerrar</a> --}}
                        <button class="cerrar-popup"><i class="icon-close" onclick=cerrar()></i></button>
                        <script>
                            setTimeout(function() {
                                document.getElementById("popup").style.display = "block";
                            }, 3000);

                            function cerrar() {
                                document.getElementById('popup').style.display = 'none';
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">

                <!------Listado de tours----------->
                @foreach ($tours->take(8) as $tour)
                    <div class="col-lg-3 col-md-6 escritorio">
                        <div class="card card-new mx-auto" style="width: 18rem;">
                            <a href="{{ route('tours.show', ['id' => $tour->id, 'slug' => $tour->slug]) }}">
                                <div class="img-container">
                                    <img class="card-img-top" src="img/buscador/{{ $tour->img }}"
                                        alt="{{ $tour->nombre }}" loading="lazy">
                                </div>
                            </a>
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $tour->nombre }}</h5>
                                <p class="text-card">{{ $tour->descripcion }}</p>
                                <div class="row iconos-tours">
                                    <div class="col-4" style="float: left">
                                        <span class="icon-clock-o"> {{ $tour->dias }} días</span>
                                    </div>
                                    <div class="col-4" style="float:right">
                                        <span class="icon-map-marker"> {{ $tour->ubicacion }}</span>
                                    </div>
                                    <div class="col-4" style="float:right">
                                        <span class="icon-usd"><strong>{{ $tour->precio }}</strong></span>
                                    </div>
                                </div>
                                <a href="{{ route('tours.show', ['slug' => $tour->slug]) }}" class="boton-card">Más
                                    detalles</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                @foreach ($tours->take(4) as $tour)
                    <div class="col-lg-3 col-md-6 responsive">
                        <div class="card card-new mx-auto" style="width: 18rem;">
                            <a href="{{ route('tours.show', ['id' => $tour->id, 'slug' => $tour->slug]) }}">
                                <div class="img-container">
                                    <img class="card-img-top" src="img/buscador/{{ $tour->img }}"
                                        alt="{{ $tour->nombre }}" loading="lazy">
                                </div>
                            </a>
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $tour->nombre }}</h5>
                                <p class="text-card">{{ $tour->descripcion }}</p>
                                <div class="row iconos-tours">
                                    <div class="col-4" style="float: left">
                                        <span class="icon-clock-o"> {{ $tour->dias }} días</span>
                                    </div>
                                    <div class="col-4" style="float:right">
                                        <span class="icon-map-marker"> {{ $tour->ubicacion }}</span>
                                    </div>
                                    <div class="col-4" style="float:right">
                                        <span class="icon-usd"><strong>{{ $tour->precio }}</strong></span>
                                    </div>
                                </div>
                                <a href="{{ route('tours.show', ['slug' => $tour->slug]) }}" class="boton-card">Más
                                    detalles</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <style>

                </style>

            </div>
            <!--------Fin porueba------------------->
            <h2>TRILHA INCA CUZCO, TRILHA INCA MACHU PICCHU</h2>
            <p>
                TRILHA INCA CUZCO é uma marca da <strong>NC TRAVEL CUSCO</strong>, agência de viagens e operador turístico
                autorizada a
                operar a rede da Trilha Inca Machu Picchu com código de autorização "CI1524" otorgado pelo Ministério da
                Cultura do Peru, veja nosso cadastro nesse link: www.machupicchu.gob.pe
            </p>
            <h3>Reserve o seu passeio para Trilha Inca Machu picchu</h3>
            <p>Veja a <a href="">disponibilidade das vagas a Trilha Inca Machu picchu</a><br>
                A trilha Inca Machu picchu é considerada, como a trilha inca mais famosa na América do Sul, conhecer a
                Trilha Inca Machu picchu é uma experiência maravilhosa e inesquecível.<br>
                Para <strong>Trilha Inca classica Machu Picchu</strong> temos duas opções como; Trilha Inca classica Machu
                Picchu Curta 2 Dias
                / 1 noite ou a Trilha Inca Clássica Machu Picchu 4 dias 3 noites.
            </p>
            <p>
                A Trilha Inca Machu Picchu fornece um roteiro detalhado do excursão sobre a Trilha Inca Machu Picchu para
                que vocês possam dar uma olhada general.<br>
                Na Trilha Inca Machu Picchu existem milhares de quilômetros de "trilha Inca" em todo o Peru; no entanto,
                vamos nos concentrar no Trilha Inca Clássica 4 dias que começa no km 82 da ferrovia para Machu Picchu e a
                outra trilha inca 2 dias comeca no quilometro 104 da rota de Machu Picchu.<br>
                A Trilha Inca Machu Picchu uma rota em que se ligam muitos ecossistemas com uma sequência de monumentos da
                mais fina arquitetura na trilha inca, terminando com a clássica vista de postal de Machu Picchu visto da
                cima da montanha de Machu Picchu. A trilha inca Machu Picchu é uma rota de peregrinação e de purificação
                para entrar no Sagrada povo de Pachacutec (Llacta de Pachacutec); são 44 quilometros da trilha inca de 4
                dias e 18 quilometros da trilha inca 2 dias, na trilha inca Machupicchu pode ser visto túneis escavados e
                muitas escadas pela cima das montanhas.<br>
                Para a Trilha Inca Machupicchu é necesario ter um bom preparo físico, a causa da altitude e as subidas ate
                ponto mais alto da trilha inca.
            </p>
        </div>
        <div class="container-fluid bannerindex d-flex mt-5">
            <div class="row ">
                <div class="col-lg-6 m-auto">
                    <h4>Reserva Trilha Inca <span class="subrayado"> 2023</span></h4>
                </div>
                <div class="col-lg-6 m-auto-djm"><a href="https://www.trilhaincacuzco.com/trilha-salkantay-machu-picchu">Reservar</a></div>
            </div>
        </div>
        <div class="container mt-5 mb-5">
            <div class="row">
                <h2>TURISMO RESPONSÁVEL</h2>
                <p>Nossa organização pratica o Turismo Responsável, portanto, temos o compromisso com uma forma de trabalho
                    cujo objetivo é alcançar um sistema econômico, social e cultural que respeite não apenas os direitos à
                    diversidade cultural, mas também o cuidado e a proteção ao meio ambiente.
                </p>
                <h2>NOSSOS GUIAS</h2>
                <p>Nós somos muito exigentes com nosso pessoal, a equipe de guias é capacitada e com vários anos de
                    experiência, todos licenciados em Turismo, de onde se distinguem a cordialidade com nossos clientes,
                    facilidade de comunicação, com domínio nos idiomas: inglês, francês e português. Nossos guias são
                    capacitados em seminários e possuem conhecimentos em primeiros-socorros, resgates e estão regulares com
                    as regras da Unidade de Gestão do Santuário Histórico de Machu Picchu e o DIRECTUR.
                </p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row text-center contenedorFood">
                        <div class="col-lg-5 m-auto">
                            <a href="https://www.trilhaincacuzco.com/trilha-salkantay-machu-picchu-4dias">
                                <img src="{{ asset('img/galeria/humantay-lake-peru-nc-travel.webp') }}"
                                    alt="Humantay lagoon Nc Travel" loading="lazy">
                            </a>
                        </div>
                        <div class="col-lg-7 m-auto">
                            <h5>TRILHA SALKANTAY MACHU PICCHU 4 DIAS E 3 NOITES</h5><br>
                            <a href="https://www.trilhaincacuzco.com/trilha-salkantay-machu-picchu-4dias"
                                class="btn-inicio">Mais detalhes</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row text-center contenedorFood">
                        <div class="col-lg-5 m-auto">
                            <a href="https://www.trilhaincacuzco.com/trilha-salkantay-machu-picchu-4dias">
                                <img src="{{ asset('img/galeria/Machu-Picchu-Inca-jungle.webp') }}"
                                    alt="Humantay lagoon Nc Travel" loading="lazy">
                            </a>
                        </div>
                        <div class="col-lg-7 m-auto">
                            <h5>TRILHA SALKANTAY MACHU PICCHU 4 DIAS E 3 NOITES</h5><br>
                            <a href="https://www.trilhaincacuzco.com/trilha-salkantay-machu-picchu-4dias"
                                class="btn-inicio">Mais detalhes</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row text-center contenedorFood">
                        <div class="col-lg-5 m-auto">
                            <a href="https://www.trilhaincacuzco.com/cusco-puno-alternativo-7dias">
                                <img src="{{ asset('img/galeria/trilha-salkantay-machu-picchu-nctravel-cusco.webp') }}"
                                    alt="Cusco e Puno alternativo nc Travel Cusco" loading="lazy">
                            </a>
                        </div>
                        <div class="col-lg-7 m-auto">
                            <h5>CUSCO E PUNO ALTERNATIVO 7 DIAS E 6 NOITES</h5><br>
                            <a href="https://www.trilhaincacuzco.com/cusco-puno-alternativo-7dias" class="btn-inicio">Mais
                                detalhes</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row text-center contenedorFood">
                        <div class="col-lg-5 m-auto">
                            <a href="https://www.trilhaincacuzco.com/trilha-inca-classica-4dias">
                                <img src="{{ asset('img/galeria/trilha-inca-nc-travel-4-dias.webp') }}"
                                    alt="Trilha inca nc travel 4 dias" loading="lazy">
                            </a>
                        </div>
                        <div class="col-lg-7 m-auto">
                            <h5>TRILHA SALKANTAY MACHU PICCHU 4 DIAS E 3 NOITES</h5><br>
                            <a href="https://www.trilhaincacuzco.com/trilha-inca-classica-4dias" class="btn-inicio">Mais
                                detalhes</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-2 mt-5 text-center">
                    <h4>Blogs más recientes:</h4>
                </div>
            </div>
        </div>
        <div class="contenedor">
            @foreach ($blogs as $blog)
                <div class="columna">
                    <div class="superpuesto"></div>
                    <img src="{{ $blog->img }}" alt="{{ $blog->nombre }}" loading="lazy">
                    <h5>{{ $blog->nombre }}</h5>
                    <a href="{{ route('muestrame', $blog->slug) }}">Leer Blog</a>
                    {{-- <a href="{{ route('tours.show', ['slug' => $tour->slug]) }}" class="boton-card">Más
                        detalles</a> --}}
                </div>
            @endforeach
        </div>
        <div class="container">
            <div class="row mt-5 mb-4">
                <div class="col-lg-12 mb-2 text-center">
                    <h5>Metodos de pagamento:</h5>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-1"><img src="{{ asset('img/thumb/Visa.png') }}" alt="" width="100px"></div>
                <div class="col-lg-1"><img src="{{ asset('img/thumb/banco-do-brasil.png') }}" alt=""
                        width="100px"></div>
                <div class="col-lg-1"><img src="{{ asset('img/thumb/american-express.png') }}" alt=""
                        width="100px"></div>
                <div class="col-lg-1"><img src="{{ asset('img/thumb/Bradesco.png') }}" alt="" width="100px">
                </div>
                <div class="col-lg-1"><img src="{{ asset('img/thumb/Dinner-Club-internacional.png') }}" alt=""
                        width="100px"></div>
                <div class="col-lg-1"><img src="{{ asset('img/thumb/wester-union.png') }}" alt=""
                        width="100px"></div>
                <div class="col-lg-1"><img src="{{ asset('img/thumb/Paypal.png') }}" alt="" width="100px">
                </div>
                <div class="col-lg-1"><img src="{{ asset('img/thumb/Master-card.png') }}" alt=""
                        width="100px"></div>
                <div class="col-lg-1"><img src="{{ asset('img/thumb/tranferencia.png') }}" alt=""
                        width="100px"></div>
            </div>
        </div>
    </section>
@endsection
