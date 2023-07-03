@extends('layouts.app')
@section('contenido')
    <div class="peru">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 text-center">
                    <h1 style="padding-top: 250px;color:#fff; font-family:'Lobster', cursive;">
                        Pacotes da Trilha Inca
                    </h1>
                    <div class="linea-2"></div>
                    <p style="color: #fff" class="text-center">
                        Esta é a nossa lista de passeios que incluem a Trilha Inca
                    </p>
                </div>
            </div>
        </div>
    </div>
    <section>
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 pt-5 pb-4">
                    <h2>Lista de passeios Trilha Inca:</h2>
                </div>
                <!-----Fin orueba--->
                @foreach ($tours as $tour)
                    @if ($tour->categoria == 'machupicchu')
                        <div class="col-lg-3 col-md-6">
                            <div class="card card-new mx-auto" style="width: 18rem;">
                                <a href="{{ route('tours.show', ['id' => $tour->id, 'slug' => $tour->slug]) }}">
                                    <div class="img-container">
                                        <img class="card-img-top" src="../img/buscador/{{ $tour->img }}"
                                            alt="Camino Inca 4 dias" loading="lazy">
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
                                    <a href="{{ route('tours.show', ['id' => $tour->id, 'slug' => $tour->slug]) }}"
                                        class="boton-card">SAIBA MAIS</a>

                                </div>
                            </div>
                        </div>
                    @endif
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
                                        <option value="Família">Viajar com a família</option>
                                        <option value="Amigos">Viajar con amigos</option>
                                        <option value="Casal">Viajar em casal</option>
                                        <option value="Grupo">Viajar em grupo</option>
                                        <option value="Privado">Viajar em privado</option>
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="mensaje">Mensaje:<span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="mensaje" name="mensaje" rows="5" placeholder="Digite sua mensagem"
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
