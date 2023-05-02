@extends('layouts.app')

@section('contenido')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar categoria:</span>
                        </div>                        
                    </div>
                    <div class="card-body">
                        <ul>
                            @foreach ($blogs as $blog)
                                <li>{{ $blog->titulo }}</li>
                            @endforeach
                        </ul>
                        {{ $blogs->links() }}

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
