@extends('layouts.admin')

@section('contenido')
    Update Buscadore
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Buscadore</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('buscadores.update', $buscadore->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('buscadore.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
