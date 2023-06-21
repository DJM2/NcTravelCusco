@extends('layouts.admin')
@section('titulo', 'Crear Reporte de Pasajeros')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <h2>Crear Reporte de Pasajeros</h2>
        </div>
        <div class="col-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="col-12">
            <form action="{{ route('reportes.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-3 mt-3">
                        <label for="tour">Paquete turístico:</label>
                        <input type="text" name="tour" class="form-control form-control-sm" required
                            value="{{ old('tour') }}">
                        @if ($errors->has('tour'))
                            <span class="text-danger">{{ $errors->first('tour') }}</span>
                        @endif
                    </div>
                    <div class="col-3 mt-3">
                        <label for="nombre">Nombre Pasajero:</label>
                        <input type="text" name="nombre" class="form-control form-control-sm" required
                            value="{{ old('nombre') }}">
                        @if ($errors->has('nombre'))
                            <span class="text-danger">{{ $errors->first('nombre') }}</span>
                        @endif
                    </div>
                    <div class="col-3 mt-3">
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="form-control form-control-sm" required
                            value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="col-3 mt-3">
                        <label for="numero">Teléfono:</label>
                        <input type="text" name="numero" class="form-control form-control-sm" required
                            value="{{ old('numero') }}">
                        @if ($errors->has('numero'))
                            <span class="text-danger">{{ $errors->first('numero') }}</span>
                        @endif
                    </div>
                    <div class="col-3 mt-3">
                        <label for="llegada">Fecha de llegada:</label>
                        <input type="date" name="llegada" class="form-control form-control-sm" required
                            value="{{ old('llegada') }}">
                        @if ($errors->has('llegada'))
                            <span class="text-danger">{{ $errors->first('llegada') }}</span>
                        @endif
                    </div>
                    <div class="col-3 mt-3">
                        <label for="salida">Fecha de salida:</label>
                        <input type="date" name="salida" class="form-control form-control-sm" required
                            value="{{ old('salida') }}">
                        @if ($errors->has('salida'))
                            <span class="text-danger">{{ $errors->first('salida') }}</span>
                        @endif
                    </div>
                    <div class="col-3 mt-3">
                        <label for="fechaInicio">Fecha Inicio de Tour:</label>
                        <input type="date" name="fechaInicio" class="form-control form-control-sm" required
                            value="{{ old('fechaInicio') }}">
                        @if ($errors->has('fechaInicio'))
                            <span class="text-danger">{{ $errors->first('fechaInicio') }}</span>
                        @endif
                    </div>
                    <div class="col-3 mt-3">
                        <label for="fechabriefing">Briefing:</label>
                        <input type="date" name="briefing" class="form-control form-control-sm" required
                            value="{{ old('briefing') }}">
                        @if ($errors->has('briefing'))
                            <span class="text-danger">{{ $errors->first('briefing') }}</span>
                        @endif
                    </div>
                    <div class="col-3 mt-3">
                        <label for="numPaxs">N° Paxs:</label>
                        <input type="number" name="numPaxs" class="form-control form-control-sm"
                            placeholder="Escoger número entre 1 a 14" onchange="generarCamposPasajeros(this.value)"
                            value="{{ old('numPaxs') }}">
                        @if ($errors->has('numPaxs'))
                            <span class="text-danger">{{ $errors->first('numPaxs') }}</span>
                        @endif
                    </div>
                    <div class="col-3 mt-3">
                        <label for="precio">Precio:</label>
                        <input type="number" name="precio" id="precio" class="form-control form-control-sm"
                            onchange="calcularRestante()" value="{{ old('precio') }}">
                        @if ($errors->has('precio'))
                            <span class="text-danger">{{ $errors->first('precio') }}</span>
                        @endif
                    </div>
                    <div class="col-3 mt-3">
                        <label for="adelanto">Adelanto:</label>
                        <input type="number" name="adelanto" id="adelanto" class="form-control form-control-sm"
                            onchange="calcularRestante()" value="{{ old('adelanto') }}">
                        @if ($errors->has('adelanto'))
                            <span class="text-danger">{{ $errors->first('adelanto') }}</span>
                        @endif
                    </div>
                    <div class="col-3 mt-3">
                        <label for="restante">Restante:</label>
                        <input type="number" name="restante" id="restante" class="form-control form-control-sm" readonly
                            value="{{ old('restante') }}">
                    </div>

                    <!------Pasajeros------------>
                    <div class="separadorReportes mt-5" style="width: 100%; border-top:1px solid grey">
                        <h3 class="mt-2">Pasajeros:</h3>
                    </div>
                    <div id="contenedorPasajeros" class="col-12 mt-3"></div>

                    <div class="separadorReportes mt-5" style="width: 100%; border-top:1px solid grey">
                        <h3 class="mt-2">Trenes:</h3>
                    </div>
                    <div class="col-lg-12 mt-3">
                        <div class="row">
                            <div class="col-3">
                                <h5>N° de trenes:</h5>
                            </div>
                            <div class="col-9">
                                <select name="trenes" class="form-control form-control-sm" id=""
                                    onchange="generarCamposTrenes(this.value)">
                                    <option value="" selected>0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="contenedorTrenes" class="col-lg-12 mt-3">
                    </div>
                    <div class="separadorReportes mt-5" style="width: 100%; border-top:1px solid grey">
                        <h3 class="mt-2">Hoteles:</h3>
                    </div>
                    <div class="col-lg-12 mt-3">
                        <div class="row">
                            <div class="col-3">
                                N° de Hoteles:
                            </div>
                            <div class="col-9">
                                <select name="hoteles" class="form-control form-control-sm" id=""
                                    onchange="generarCamposHoteles(this.value)">
                                    <option value="" selected>0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="contenedorHoteles" class="col-lg-12 mt-3">
                    </div>

                    <div class="col-12 mt-3">
                        <label for="detalles">Detalles:</label>
                        <textarea name="detalles" class="ckeditor" rows="5" placeholder="Ingrese los detalles"></textarea>
                    </div>
                    <script>
                        function generarCamposPasajeros(numeroPasajeros) {
                            var contenedorPasajeros = document.getElementById('contenedorPasajeros');
                            contenedorPasajeros.innerHTML = '';

                            for (var i = 1; i <= numeroPasajeros; i++) {
                                contenedorPasajeros.innerHTML += `
                                <div class="row">
                    <div class="col-1 mt-3">
                        <label for="nombre${i}">Pasajero:</label>
                        <input type="text" value="${i}" class="form-control form-control-sm" readonly>
                    </div>
                    <div class="col-3 mt-3">
                        <label for="nombre${i}">Nombre:</label>
                        <input type="text" name="pasajeros[${i}][nombre]" class="form-control form-control-sm" required>
                    </div>
                    <div class="col-2 mt-3">
                        <label for="nacionalidad${i}">Nacionalidad:</label>
                        <input type="text" name="pasajeros[${i}][nacionalidad]" class="form-control form-control-sm" required>
                    </div>
                    <div class="col-2 mt-3">
                        <label for="pasaporte${i}">N° de Pasaporte:</label>
                        <input type="text" name="pasajeros[${i}][numeroPasaporte]" class="form-control form-control-sm" required>
                    </div>
                    <div class="col-2 mt-3">
                        <label for="nacimiento${i}">Fecha de nacimiento:</label>
                        <input type="date" name="pasajeros[${i}][fechaNacimiento]" class="form-control form-control-sm" required>
                    </div>
                    <div class="col-2 mt-3">
                        <label for="alimentacion${i}">Alimentición:</label>
                        <select name="pasajeros[${i}][alimentacion]" class="form-control form-control-sm" required>
                            <option value="vegano">Vegano</option>
                            <option value="no_vegano">No Vegano</option>
                        </select>
                    </div>
                </div>
                <hr>
            `;
                            }
                        }
                    </script>

                    <script>
                        function generarCamposTrenes(numeroTrenes) {
                            var contenedorTrenes = document.getElementById('contenedorTrenes');
                            contenedorTrenes.innerHTML = '';

                            if (numeroTrenes > 0) {
                                for (var i = 1; i <= numeroTrenes; i++) {
                                    contenedorTrenes.innerHTML += `
            <div class="row">
              <div class="col-1 mt-3">
                <label for="tren${i}">Tren:</label>
                <input type="text" value="${i}" class="form-control form-control-sm" readonly>
              </div>
              <div class="col-3 mt-3">
                <label for="ruta${i}">Ruta:</label>
                <input type="text" name="trenes[${i-1}][ruta]" class="form-control form-control-sm">
              </div>
              <div class="col-2 mt-3">
                <label for="compania${i}">Compañía:</label>
                <input type="text" name="trenes[${i-1}][compania]" class="form-control form-control-sm">
              </div>
              <div class="col-2 mt-3">
                <label for="servicio${i}">Servicio:</label>
                <input type="text" name="trenes[${i-1}][servicio]" class="form-control form-control-sm">
              </div>
              <div class="col-2 mt-3">
                <label for="fecha${i}">Fecha:</label>
                <input type="date" name="trenes[${i-1}][fecha]" class="form-control form-control-sm">
              </div>
              <div class="col-2 mt-3">
                <label for="hora${i}">Hora:</label>
                <input type="text" name="trenes[${i-1}][hora]" class="form-control form-control-sm">
              </div>
            </div>
            <hr>
          `;
                                }
                            }
                        }
                    </script>

                    <script>
                        function generarCamposHoteles(numeroHoteles) {
                            var contenedorHoteles = document.getElementById('contenedorHoteles');
                            contenedorHoteles.innerHTML = '';
                            for (var i = 1; i <= numeroHoteles; i++) {
                                contenedorHoteles.innerHTML += `
                <div class="row">
                    <div class="col-3 mt-3">
                        <label for="hotel${i}">Hotel:</label>
                        <input type="text" name="hoteles[${i}][hotel]" class="form-control form-control-sm" required>
                    </div>
                    <div class="col-3 mt-3">
                        <label for="lugar${i}">Lugar:</label>
                        <input type="text" name="hoteles[${i}][lugar]" class="form-control form-control-sm" required>
                    </div>
                    <div class="col-2 mt-3">
                        <label for="acomodacion${i}">Acomodación:</label>
                        <input type="text" name="hoteles[${i}][acomodacion]" class="form-control form-control-sm" required>
                    </div>
                    <div class="col-2 mt-3">
                        <label for="fechaIngreso${i}">Fecha de ingreso:</label>
                        <input type="date" name="hoteles[${i}][fechaIngreso]" class="form-control form-control-sm" required>
                    </div>
                    <div class="col-2 mt-3">
                        <label for="fechaSalida${i}">Fecha de salida:</label>
                        <input type="date" name="hoteles[${i}][fechaSalida]" class="form-control form-control-sm" required>
                    </div>
                </div>
                <hr>
            `;
                            }
                        }
                    </script>




                    <script>
                        function calcularRestante() {
                            var precio = parseFloat(document.getElementById('precio').value) || 0;
                            var adelanto = parseFloat(document.getElementById('adelanto').value) || 0;
                            var restante = precio - adelanto;
                            document.getElementById('restante').value = restante;
                        }
                    </script>

                    <button type="submit" class="btn btn-primary mt-3">Guardar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
