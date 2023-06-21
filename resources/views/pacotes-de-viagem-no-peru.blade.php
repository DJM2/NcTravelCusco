@extends('layouts.app')
@section('titulo', 'Pacotes de viagem no Peru')
@section('metas')
    <meta name="title" content="Pacotes de viagem no Peru" />
    <meta name="description"
        content="Encontre os melhores pacotes de viagem para o Peru e descubra as maravilhas deste país incrível. Explore Machu Picchu, Cusco, Lima e muito mais. Reserve suas férias no Peru agora!">
    <meta name="keywords" content="pacotes de viagem, Peru, férias no Peru, Machu Picchu, Cusco, Lima, turismo no Peru" />
    <meta rel="canonical" href="https://www.trilhaincacuzco.com/pacotes-de-viagem-no-peru">

    <meta name="og_image" content="https://trilhaincacuzco.com/img/panoramico/machu-picchu--pacotes-peru-nc-travel.webp" />
    <meta name="og_secureImage"
        content="https://trilhaincacuzco.com/img/panoramico/machu-picchu--pacotes-peru-nc-travel.webp" />

    <meta property="og:title" content="Contato Nc Travel Cusco" />
    <meta property="og:description"
        content="Encontre os melhores pacotes de viagem para o Peru e descubra as maravilhas deste país incrível. Explore Machu Picchu, Cusco, Lima e muito mais. Reserve suas férias no Peru agora!" />
    <meta property="og:locale" content="pt" />
    <meta property="og:url" content="https://www.trilhaincacuzco.com/pacotes-de-viagem-no-peru" />
    <meta name="twitter:card" content="summary" />
    <meta name="robots" content="index,follow" />
@endsection
@section('contenido')
    <div class="peru">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 text-center">
                    <h1 style="padding-top: 250px;color:#fff">
                        Pacotes de viagem no Peru
                    </h1>
                    <p style="color: #fff" class="text-center">
                        Esta é uma lista de todos os nossos passeios que percorrem o Peru
                    </p>
                </div>
                <div class="col-lg-12 text-center">
                    @if (session('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <section>
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 pt-5 pb-4">
                    <p>
                        Se o seu sonho é explorar as <strong>maravilhas do Peru</strong>, deixe nas nossas mãos a criação do
                        seu pacote
                        turístico para que você viva uma experiência única e personalizada. No nosso país, você encontrará
                        uma diversidade cultural, paisagens impressionantes e uma rica história que irão cativá-lo em cada
                        lugar.<br><br>

                        Descubra a enigmática cidade perdida dos Incas, <strong>Machu Picchu</strong>, uma das 7 maravilhas
                        do mundo moderno,
                        onde os vestígios incas se entrelaçam com a imponência das montanhas e os Apus protetores da região
                        de Cusco. A 2400 metros acima do nível do mar, você encontrará terraços, fontes, templos e palácios
                        que o transportarão ao passado. Não deixe de subir as icônicas Montanhas <strong>Huayna
                            Picchu</strong> e Machu Picchu para obter vistas panorâmicas inesquecíveis.<br><br>

                        Mas o Peru é muito mais do que Machu Picchu. Embarque em uma viagem fascinante e mergulhe na
                        história das culturas pré-colombianas nas misteriosas <strong>linhas de Nazca</strong>, onde enormes
                        geoglifos se estendem pelo deserto. Explore a beleza natural da <strong>Amazônia peruana</strong>,
                        lar de uma incrível biodiversidade e reservas naturais protegidas. Navegue pelo impressionante Lago
                        Titicaca e conheça as ilhas flutuantes dos Uros, onde comunidades indígenas o receberão
                        calorosamente.<br><br>

                        Deixe-se encantar pela arquitetura colonial e pela vibrante vida urbana de Lima, a capital
                        cosmopolita do país. Descubra a cidade <strong>branca de Arequipa</strong>, cercada por imponentes
                        vulcões, e
                        desfrute da deliciosa <strong>gastronomia peruana</strong>, reconhecida internacionalmente como uma
                        das melhores do
                        mundo.<br>

                        Resumindo, convidamos você a explorar tudo o que o Peru tem a oferecer: história, natureza, cultura
                        e uma hospitalidade incomparável. Nossos pacotes turísticos permitirão que você viva uma experiência
                        única e enriquecedora, onde Machu Picchu será apenas uma parte da incrível aventura que o aguarda
                        neste fascinante país.<br>

                        Prepare-se para descobrir o Peru e criar memórias inesquecíveis!
                    </p>
                    <h2>Lista de passeios pelo Peru:</h2>
                </div>
                <!-----Fin orueba--->
                @foreach ($tours as $tour)
                    <div class="col-lg-3 col-md-6">
                        <div class="card card-new" style="width: 18rem;">
                            <a href="{{ route('tours.show', ['id' => $tour->id, 'slug' => $tour->slug]) }}">
                                <div class="img-container">
                                    <img class="card-img-top" src="../img/buscador/{{ $tour->img }}"
                                        alt="Camino Inca 4 dias" loading="lazy">
                                </div>
                            </a>
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $tour->nombre }}</h5>
                                <div class="mx-auto mt-3">
                                    <p class="text-center mb-0"><span class="icon-clock-o"> Número de dias:
                                            {{ $tour->dias }}</p>
                                    <p class="text-center mb-0"><span class="icon-map-marker"> Localização:
                                            {{ $tour->ubicacion }}</p>
                                    <p class="text-center mb-0"><span class="icon-usd"> A partir de:
                                            <strong>U${{ $tour->precio }}</strong></p>
                                </div>
                                <a href="{{ route('tours.show', ['id' => $tour->id, 'slug' => $tour->slug]) }}"
                                    class="boton-card-2">Más Info</a>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="container-fluid bannerindex d-flex mt-5">
            <div class="row" style="width: 700px">
                <div class="col-lg-6 m-auto">
                    <h4 class="subrayado"> Informe-se agora!</h4>
                </div>
                <div class="col-lg-6 m-auto-djm">
                    <a href="#popup" data-toggle="modal" data-target="#popupModal">Reservar</a>
                </div>
            </div>
        </div>
        <div class="modal fade modal-lg" id="popupModal" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="popupModalLabel">Reserva o seu pacote para Peru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('enviar.formulario') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="nombre">Nombre: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm" id="nombre" name="nombre"
                                        placeholder="Digite su nombre" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email">E-mail: <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control form-control-sm" id="email"
                                        name="email" placeholder="Digite su e-mail" required>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="telefono">Teléfono:<i class="icon-whatsapp text-success"></i> <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm" id="telefono"
                                        name="telefono" placeholder="Digite su teléfono" required>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="fecha">Fecha:</label>
                                    <input type="date" class="form-control form-control-sm" id="fecha"
                                        name="fecha" placeholder="Digite la fecha deseada">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="nacionalidad">Nacionalidad:</label>
                                    <input type="text" class="form-control form-control-sm" id="nacionalidad"
                                        name="nacionalidad" placeholder="Digite su nacionalidad">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="interes">Interés:</label>
                                    <select class="form-control form-control-sm" id="interes" name="interes">
                                        <option value="Família">Viajar en familia</option>
                                        <option value="Amigos">Viajar con amigos</option>
                                        <option value="Casal">Viajar en pareja</option>
                                        <option value="Grupo">Viajar en grupo</option>
                                        <option value="Privado">Viajar en privado</option>
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="mensaje">Mensaje:<span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="mensaje" name="mensaje" rows="5" placeholder="Digite su mensaje"
                                        required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" class="btn btn-secondary btn-sm"
                                    data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary btn-sm">Enviar mensaje</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
