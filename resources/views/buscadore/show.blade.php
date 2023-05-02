@extends('layouts.app')
@section('contenido')
    <div class="blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 style="padding-top: 30vh;color:#fff">Blogs relacionados al Tag: {{ $tag->nombre }}</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="container">
        <div class="row mb-5">
            <div class="col-lg-12">
                <h2>Blogs relacionados al Tag:</h2>
            </div>
            <div class="col-lg-3">
                @foreach ($blogs as $blog)
                    <img src="{{ $blog->img }}" alt="{{ $blog->nombre }}" loading="lazy" width="100%">
                    <h2>{{ $blog->nombre }}</h2>
                    <p>{{ $blog->descripcion }}</p>
                    <p>Tags:</p>
                    @foreach ($blog->categorias as $tag)
                        <a href="{{ route('tag', $tag->slug) }}">#{{ $tag->nombre }}</a>
                    @endforeach
                @endforeach
            </div>
        </div>
    </section>
@endsection
