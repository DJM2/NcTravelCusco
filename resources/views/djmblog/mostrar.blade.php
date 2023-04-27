@extends('layouts.app')
@section('titulo', 'Agência de viagens NC Travel Cusco')
@section('metas')
@endsection
@section('contenido')
    <div class="blog-head">
        <div class="centrado">
            <h1>{{ $blog->nombre }}</h1>
            <div class="lineablog"></div>
        </div>
    </div>
    <section>
        <div class="container-lg">
            <div class="row">
                <div class="col-12 mt-4">
                    <p style="font-weight:500">Última atualização fechar: <i class="icon-date_range"></i> {{ $update }}
                    </p>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            {!! $blog->cuerpo !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 suscribe">
                    <h4>Assine a newsletter</h4>
                    <form action="#" method="post" class="form-inline text-center">
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" id="name" name="name" required
                                placeholder="Nome">
                        </div>
                        <div class="form-group mb-2">
                            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail"
                                required>
                        </div>
                        <button type="submit" class="btn-blog">Subscrever</button>
                    </form>
                    <h4>Postagens recentes:</h4>
                    <div class="blogsrelative">
                        @foreach ($djmblogs as $djmblog)
                            <div>
                                <a href="{{ route('muestrame', $blog->slug) }}">{{ $djmblog->nombre }}</a>
                            </div>
                        @endforeach
                    </div>
                    <h4>Tours:</h4>
                    <div class="toursBlog">
                        @foreach ($tours->take(5) as $tour)
                            <a href="{{ route('tours.show', ['id' => $tour->id, 'slug' => $tour->slug]) }}">
                                <i class="icon-arrow-right"></i> {{ $tour->nombre }}
                                <span>→ {{ $tour->dias }} días</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="share">
                <h3>Compartir: </h3>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ request()->fullUrl() }}" target="_blank"
                    rel="nofollow noopener noreferrer" target="_blank" rel="noopener nofollow"
                    class="btn-social">
                    <i class="icon-facebook"></i>
                </a>
                <a href="https://twitter.com/intent/tweet?url={{ request()->fullUrl() }}" target="_blank"
                    rel="nofollow noopener noreferrer" target="_blank" rel="noopener" class="btn-social">
                    <i class="icon-twitter"></i>
                </a>
                <a href="https://wa.me/?text={{ request()->fullUrl() }}" target="_blank" rel="noopener"
                    class="btn-social">
                    <i class="icon-whatsapp"></i>
                </a>
                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ request()->fullUrl() }}"
                    target="_blank" rel="noopener" class="btn-social">
                    <i class="icon-linkedin"></i>
                </a>
                <a href="https://www.pinterest.com/pin/create/button/?url={{ request()->fullUrl() }}&media={{ urlencode($tour->img) }}&description={{ urlencode($tour->descripcion) }}"
                    target="_blank" rel="noopener" class="btn-social">
                    <i class="icon-pinterest"></i>
                 </a>
            </div>

        </div>
        <div class="container-fluid bannerindex d-flex mt-5">
            <div class="row ">
                <div class="col-lg-6 m-auto">
                    <h4>Reserva Trilha Inca <span class="subrayado"> 2023</span></h4>
                </div>
                <div class="col-lg-6 m-auto-djm"><a href="">Reservar</a></div>
            </div>
        </div>
    </section>
@endsection
