@extends('layouts.admin')

@section('contenido')
    Update Djmblog
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Djmblog</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('djm.update', $djmblog->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('djmblog.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
