@extends('layouts.admin')

@section('titulo', 'Lista de blogs en ingles')

@section('contenido')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Blogsen') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('blog.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear nuevo blog') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tabladatos" class="table table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>Id:</th>                                        
										<th>Nombre:</th>
										<th>Descripcion:</th>
										<th>Detallado:</th>
										<th>Status:</th>
										<th>Creador:</th>
                                        <th>Imagen:</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blogs as $blog)
                                        <tr>
                                            <td>{{ $blog->id }}</td>                                            
											<td>{{ $blog->nombre }}</td>
											<td>{{ $blog->descripcion }}</td>
											<td>{{ $blog->status }}</td>
											<td>{{ $blog->detalle }}</td>

											<td><img width="100px" src="{{ asset('img/buscador/' . $blogsen->img) }}" alt="Imagen"></td>


                                            <td style="width: 160px">
                                                <form action="{{ route('blogsens.destroy',$blogsen->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('blogsens.show',$blogsen->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('blogsens.edit',$blogsen->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        var j = jQuery.noConflict();
        j(document).ready(function() {
            j('#tabladatos').DataTable();
        });
    </script>
@endsection
