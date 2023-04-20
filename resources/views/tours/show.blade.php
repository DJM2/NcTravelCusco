@extends('layouts.app')
@section('titulo', $tour->nombre)
@include('layouts.metas')
@section('contenido')
    <div class="blog" id="blog">
        <!----Variable de clase------>
        <div id="sarah" style="opacity: 0">
            {{ $tour->clase }}
            <script>
                const nombre = document.getElementById('sarah').innerText;
                const insertar = document.getElementById('blog');
                if (nombre) {
                    insertar.classList.remove("blog");
                    insertar.classList.add(nombre);
                } else {
                    insertar.classList.add("blog");
                }
            </script>
        </div>
        <!----Fin Variable de clase------>

        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 style="padding-top: 250px;color:#fff">{{ $tour->nombre }}</h1>
                    <div class="linea-2"></div>
                    <div class="col-lg-12 text-center font-weight-bold" style="color: #fff">
                        <span><i class="icon-map-marker"></i> {{ $tour->ubicacion }}</span>&nbsp;&nbsp;
                        <span><i class="icon-clock-o"></i> {{ $tour->dias }} días</span>&nbsp;&nbsp;
                        <span><i class="icon-usd"></i> {{ $tour->precio }}.00</span>&nbsp;&nbsp;
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section>
        <div class="container pt-5">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    @if (session('status'))
                        <div class="text-success text-center">
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        </div>
                    @endif
                    <div class="details">
                        <div class="location">
                            <p><a href="{{ route('inicio') }}">Inicio</a> /
                                <a id="cat">
                                    {{ $tour->categoria }}
                                    <script>
                                        const cat = document.getElementById("cat");
                                        const tourCategoria = "<?php echo $tour->categoria; ?>";
                                        switch (tourCategoria) {
                                            case "machupicchu":
                                                cat.textContent = "Pacotes Trilha Inca";
                                                break;
                                            case "around":
                                                cat.textContent = "Pacotes Machu Picchu";
                                                break;
                                            case "hikes":
                                                cat.textContent = "Pacotes Peru";
                                                break;
                                            case "luxury":
                                                cat.textContent = "Rotas Alternativas";
                                                break;
                                            default:
                                                cat.textContent = tourCategoria;
                                                break;
                                        }
                                    </script>
                                </a>
                                / <a>{{ $tour->nombre }}</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <h2>{{ $tour->nombre }}</h2>
                    <div class="linea-3"></div>
                    <p class="text-justify">{!! $tour->contenido !!}</p>
                    <br>
                    <ul class="nav nav-tabs justify-content-center uldjm" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="roteiro-tab" data-toggle="tab" href="#roteiro" role="tab"
                                aria-controls="roteiro" aria-selected="true">Roteiro</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="precos-tab" data-toggle="tab" href="#precos" role="tab"
                                aria-controls="precos" aria-selected="false">Precos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="inclui-tab" data-toggle="tab" href="#inclui" role="tab"
                                aria-controls="inclui" aria-selected="false">O que Inclui</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="map-tab" data-toggle="tab" href="#map" role="tab"
                                aria-controls="map" aria-selected="false">Mapa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="opciones-tab" data-toggle="tab" href="#opciones" role="tab"
                                aria-controls="opciones" aria-selected="false">Opcionais</a>
                        </li>
                    </ul>
                    <div class="tab-content pt-4" id="myTabContent">
                        <div class="tab-pane fade show active" id="roteiro" role="tabpanel" aria-labelledby="roteiro-tab">
                            {!! $tour->resumen !!}</div>
                        <div class="tab-pane fade" id="precos" role="tabpanel" aria-labelledby="precose-tab">
                            {!! $tour->detallado !!}
                        </div>
                        <div class="tab-pane fade" id="inclui" role="tabpanel" aria-labelledby="inclui-tab">
                            {!! $tour->incluidos !!}
                        </div>
                        <div class="tab-pane fade" id="map" role="tabpanel" aria-labelledby="map-tab">
                            @if ($tour->mapa)
                                <img src="../img/buscador/{{ $tour->mapa }}" width="100%" height="auto"
                                    loading="lazy">
                            @endif
                        </div>
                        <div class="tab-pane fade" id="opciones" role="tabpanel" aria-labelledby="opciones-tab">
                            {!! $tour->importante !!}
                        </div>
                    </div>
                    <div class="share">
                        <h3>Compartir</h3>
                        <!-- Load Facebook SDK for JavaScript -->
                        <div id="fb-root"></div>
                        <script>
                            (function(d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0];
                                if (d.getElementById(id)) return;
                                js = d.createElement(s);
                                js.id = id;
                                js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
                                fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));
                        </script>

                        <!-- Your share button code -->
                        <div class="fb-share-button" data-href="{{ request()->fullUrl() }}" data-layout="button_count">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="div-form-tours">
                        <h3 class="h3book ">Solicite informações</h3>
                        <form class="djmFormShow" action="{{ route('mensajePacha') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="inputEmail4">Nome:</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                        placeholder="Inca Pachacutec" required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="inputEmail4">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="hijo-del-sol@gmail.com" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputAddress">N° Passageiros:</label>
                                    <input type="number" class="form-control" name="adultos" id="inputAddress"
                                        placeholder="Number" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputAddress2" title="Children under 3 years old do not pay">Crianças:
                                        ⓘ</label>
                                    <input type="number" name="childs" class="form-control" id="inputAddress2"
                                        placeholder="Number">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Data da viagem Peru:</label>
                                    <input type="date" name="date" class="form-control" id="date">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Número de telefone: <i class="icon-whatsapp"></i></label>
                                    <input type="number" class="form-control" id="phone" name="phone" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="tour">Percorrer:</label>
                                    <input type="text" class="form-control" id="tour"
                                        value="{{ $tour->nombre }}" name="tour" readonly>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="mensaje">Mensagem:</label>
                                    <textarea class="form-control" name="mensaje" id="mensaje">
                                    </textarea>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="boton-card">Enviar</button>
                            </div>
                        </form>
                        <div class="card align-items-center text-center">
                            <div class="card-bod">
                                <h4 class="text-center mt-2">Suporte ao cliente:</h4>
                                <p class="text-center"><i class="icon-whatsapp">
                                    </i> +51 984 606 757<br>
                                    </i> niko@nctravelcusco.com
                                </p>
                            </div>
                        </div>
                        <div class="card align-items-center text-center">
                            <div class="card-bod">
                                <h4 class="mt-2">Metodos de Pagamento:</h4>
                                <img src="{{ asset('img/galeria//Métodos-de-pagamento.webp') }}"
                                    alt="Metodos de pagamento" width="100%">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="space"></div>
                <div class="col-lg-12">
                    <h2 class="h2-nc-travel">Passeios semelhantes:</h2>
                    <div class="linea-2"></div>
                </div>
                @foreach ($tours->take(4) as $tour)
                <div class="col-lg-3 col-md-6">
                    <div class="card card-new mx-auto" style="width: 18rem;">
                        <a href="{{ route('tours.show', ['id' => $tour->id, 'slug' => $tour->slug]) }}">
                            <div class="img-container">
                                <img class="card-img-top" src="img/buscador/{{ $tour->img }}"
                                    alt="{{ $tour->nombre }}" loading="lazy">
                            </div>
                        </a>
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $tour->nombre }}</h5>
                            
                            <div class="row iconos-tours mt-4">
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
                            <a href="{{ route('tours.show', ['slug' => $tour->slug]) }}"
                                class="boton-card">Más
                                detalles</a>
                        </div>
                    </div>
                </div>
        @endforeach
                <div class="space mt-5"></div>
            </div>
        </div>
    </section>

@endsection
