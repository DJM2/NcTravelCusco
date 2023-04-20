@extends('layouts.admin')

@section('contenido')
    {{ $buscadore->name ?? 'Show Buscadore' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Buscadore</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('buscadores.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $buscadore->nombre }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
