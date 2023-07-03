@extends('layouts.admin')

@section('titulo', 'Editar Reporte de Pasajeros')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <h2>Editar Reporte de Pasajeros</h2>
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
            <form action="{{ route('reportes.update', $reporte->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-3 mt-3">
                        <label for="tour">Paquete turístico:</label>
                        <input type="text" name="tour" class="form-control form-control-sm"
                            value="{{ $reporte->tour }}" required>
                    </div>
                    <div class="col-md-3 mt-3">
                        <label for="nombre">Nombre Pasajero:</label>
                        <input type="text" name="nombre" class="form-control form-control-sm"
                            value="{{ $reporte->nombre }}" required>
                    </div>
                    <div class="col-md-3 col-6 mt-3">
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="form-control form-control-sm"
                            value="{{ $reporte->email }}" required>
                    </div>
                    <div class="col-md-3 col-6 mt-3">
                        <label for="numero">Teléfono:</label>
                        <input type="text" name="numero" class="form-control form-control-sm" value="{{ $reporte->numero }}" required>
                    </div>
                    <div class="col-md-3 col-6 mt-3">
                        <label for="llegada">Fecha de llegada:</label>
                        <input type="date" name="llegada" class="form-control form-control-sm" value="{{ $reporte->llegada }}" required>
                    </div>
                    <div class="col-md-3 col-6 mt-3">
                        <label for="salida">Fecha de salida:</label>
                        <input type="date" name="salida" class="form-control form-control-sm" value="{{ $reporte->salida }}" required>
                    </div>
                    <div class="col-md-3 col-6 mt-3">
                        <label for="fechaInicio">Fecha Inicio:</label>
                        <input type="date" name="fechaInicio" class="form-control form-control-sm"
                            value="{{ $reporte->fechaInicio }}" required>
                    </div>
                    <div class="col-md-3 col-6 mt-3">
                        <label for="fechabriefing">Briefing:</label>
                        <input type="date" name="briefing" class="form-control form-control-sm"
                            value="{{ $reporte->briefing }}">
                    </div>
                    <div class="col-md-3 col-6 mt-3">
                        <label for="numPaxs">N° Paxs:</label>
                        <input type="number" name="numPaxs" class="form-control form-control-sm"
                            placeholder="Escoger numero entre 1 a 14" value="{{ $reporte->numPaxs }}"
                            onchange="generarCamposPasajeros(this.value)">
                    </div>
                    <div class="col-md-3 col-6 mt-3">
                        <label for="precio">Precio:</label>
                        <input type="number" name="precio" id="precio" class="form-control form-control-sm"
                            onchange="calcularRestante()" value="{{ $reporte->precio }}">
                    </div>
                    <div class="col-md-3 col-6 mt-3">
                        <label for="adelanto">Adelanto:</label>
                        <input type="number" name="adelanto" id="adelanto" class="form-control form-control-sm"
                            onchange="calcularRestante()" value="{{ $reporte->adelanto }}">
                    </div>
                    <div class="col-md-3 col-6 mt-3">
                        <label for="restante">Restante:</label>
                        <input type="number" name="restante" id="restante" class="form-control form-control-sm" readonly>
                    </div>
                    <!----------Pasajeros------------>
                    <div class="separadorReportes mt-5" style="width: 100%; border-top:1px solid grey">
                        <h3 class="mt-2">Pasajeros:</h3>
                    </div>
                    <div id="contenedorPasajeros" class="col-12 mt-2">
                        @foreach ($reporte->pasajeros as $index => $pasajero)
                            <div class="row">
                                <div class="col-lg-1 mt-3">
                                    <label>Pasajero: </label>
                                    <input type="text" value="{{ $index + 1 }}" class="form-control form-control-sm"
                                        readonly>
                                </div>
                                <div class="col-md-3 col-12 mt-3">
                                    <label for="nombre{{ $index }}">Nombre:</label>
                                    <input type="text" name="pasajeros[{{ $index }}][nombre]"
                                        class="form-control form-control-sm" value="{{ $pasajero->nombre }}" required>
                                </div>
                                <div class="col-md-2 col-6 mt-3">
                                    <label for="nacionalidad{{ $index }}">Nacionalidad:</label>
                                    <input type="text" name="pasajeros[{{ $index }}][nacionalidad]"
                                        class="form-control form-control-sm" value="{{ $pasajero->nacionalidad }}"
                                        required>
                                </div>
                                <div class="col-md-2 col-6 mt-3">
                                    <label for="pasaporte{{ $index }}">N° de Pasaporte:</label>
                                    <input type="text" name="pasajeros[{{ $index }}][numeroPasaporte]"
                                        class="form-control form-control-sm" value="{{ $pasajero->numeroPasaporte }}"
                                        required>
                                </div>
                                <div class="col-md-2 col-6 mt-3">
                                    <label for="nacimiento{{ $index }}">Fecha de nacimiento:</label>
                                    <input type="date" name="pasajeros[{{ $index }}][fechaNacimiento]"
                                        class="form-control form-control-sm" value="{{ $pasajero->fechaNacimiento }}"
                                        required>
                                </div>
                                <div class="col-md-2 col-6 mt-3">
                                    <label for="alimentacion{{ $index }}">Alimentación:</label>
                                    <select name="pasajeros[{{ $index }}][alimentacion]"
                                        class="form-control form-control-sm" required>
                                        <option value="vegano"
                                            {{ $pasajero->alimentacion === 'vegano' ? 'selected' : '' }}>Vegano</option>
                                        <option value="no_vegano"
                                            {{ $pasajero->alimentacion === 'no_vegano' ? 'selected' : '' }}>No Vegano
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                    <div class="separadorReportes mt-3 mb-2" style="width: 100%; border-top:1px solid grey">
                        <h3 class="mt-2">Trenes:</h3>
                    </div>
                    <div id="contenedorTrenes" class="col-12">
                        @foreach ($reporte->trenes as $index => $tren)
                            <div class="row">
                                <div class="col-lg-1 mt-3">
                                    <label>Tren: </label>
                                    <input type="text" value="{{ $index + 1 }}"
                                        class="form-control form-control-sm" readonly>
                                </div>
                                <div class="col-md-3 col-6 mt-3">
                                    <label for="origen{{ $index }}">Origen:</label>
                                    <input type="text" name="trenes[{{ $index }}][ruta]"
                                        class="form-control form-control-sm" value="{{ $tren->ruta }}" required>
                                </div>
                                <div class="col-md-2 col-6 mt-3">
                                    <label for="destino{{ $index }}">Compañia:</label>
                                    <input type="text" name="trenes[{{ $index }}][compania]"
                                        class="form-control form-control-sm" value="{{ $tren->compania }}" required>
                                </div>
                                <div class="col-md-2 col-6 mt-3">
                                    <label for="compania{{ $index }}">Servicio:</label>
                                    <input type="text" name="trenes[{{ $index }}][servicio]"
                                        class="form-control form-control-sm" value="{{ $tren->servicio }}" required>
                                </div>
                                <div class="col-md-2 col-6 mt-3">
                                    <label for="fecha{{ $index }}">Fecha:</label>
                                    <input type="date" name="trenes[{{ $index }}][fecha]"
                                        class="form-control form-control-sm" value="{{ $tren->fecha }}" required>
                                </div>
                                <div class="col-md-2 col-12 mt-3">
                                    <label for="numero{{ $index }}">Hora:</label>
                                    <input type="text" name="trenes[{{ $index }}][hora]"
                                        class="form-control form-control-sm" value="{{ $tren->hora }}" required>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    </div>

                    <div class="separadorReportes mt-3 mb-2" style="width: 100%; border-top:1px solid grey">
                        <h3 class="mt-2">Hoteles:</h3>
                    </div>
                    <div id="contenedorHoteles" class="col-12">
                        @foreach ($reporte->hoteles as $index => $hotel)
                            <div class="row">
                                <div class="col-lg-1 mt-3">
                                    <label>Hotel:</label>
                                    <input type="text" value="{{ $index + 1 }}" class="form-control form-control-sm" readonly>
                                </div>
                                <div class="col-md-3 mt-3">
                                    <label for="hotel{{ $index }}">Hotel:</label>
                                    <input type="text" name="hoteles[{{ $index }}][hotel]" class="form-control form-control-sm" value="{{ $hotel->hotel }}" required>
                                </div>
                                <div class="col-md-2 col-6 mt-3">
                                    <label for="lugar{{ $index }}">Lugar:</label>
                                    <input type="text" name="hoteles[{{ $index }}][lugar]" class="form-control form-control-sm" value="{{ $hotel->lugar }}" required>
                                </div>
                                <div class="col-md-2 col-6 mt-3">
                                    <label for="acomodacion{{ $index }}">Acomodación:</label>
                                    <input type="text" name="hoteles[{{ $index }}][acomodacion]" class="form-control form-control-sm" value="{{ $hotel->acomodacion }}" required>
                                </div>
                                <div class="col-md-2 col-6 mt-3">
                                    <label for="fechaIngreso{{ $index }}">Fecha de ingreso:</label>
                                    <input type="date" name="hoteles[{{ $index }}][fechaIngreso]" class="form-control form-control-sm" value="{{ $hotel->fechaIngreso }}" required>
                                </div>
                                <div class="col-md-2 col-6 mt-3">
                                    <label for="fechaSalida{{ $index }}">Fecha de salida:</label>
                                    <input type="date" name="hoteles[{{ $index }}][fechaSalida]" class="form-control form-control-sm" value="{{ $hotel->fechaSalida }}" required>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                    
                    

                    <div class="col-12 mt-3">
                        <label for="detalles">Detalles:</label>
                        <textarea name="detalles" class="ckeditor form-control">{{ $reporte->detalles }}</textarea>
                    </div>
                </div>

                <script>
                    function generarCamposPasajeros(numeroPasajeros) {
                        var contenedorPasajeros = document.getElementById('contenedorPasajeros');
                        contenedorPasajeros.innerHTML = '';

                        for (var i = 1; i <= numeroPasajeros; i++) {
                            contenedorPasajeros.innerHTML += `
                            <div class="row">
                <div class="col-lg-1 mt-3">
                    <label for="nombre${i}">Pasajero ${i}:</label>
                    <input type="text" value="${i}" class="form-control" readonly>
                </div>
                <div class="col-md-3 mt-3">
                    <label for="nombre${i}">Nombre:</label>
                    <input type="text" name="pasajeros[${i}][nombre]" class="form-control" required>
                </div>
                <div class="col-md-2 col-6 mt-3">
                    <label for="nacionalidad${i}">Nacionalidad:</label>
                    <input type="text" name="pasajeros[${i}][nacionalidad]" class="form-control" required>
                </div>
                <div class="col-md-2 col-6 mt-3">
                    <label for="pasaporte${i}">N° de Pasaporte:</label>
                    <input type="text" name="pasajeros[${i}][numeroPasaporte]" class="form-control" required>
                </div>
                <div class="col-md-2 col-6 mt-3">
                    <label for="nacimiento${i}">Fecha de nacimiento:</label>
                    <input type="date" name="pasajeros[${i}][fechaNacimiento]" class="form-control" required>
                </div>
                <div class="col-md-2 col-6 mt-3">
                    <label for="alimentacion${i}">Alimentición:</label>
                    <select name="pasajeros[${i}][alimentacion]" class="form-control" required>
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

                        for (var i = 1; i <= numeroTrenes; i++) {
                            contenedorTrenes.innerHTML += `
                                <div class="row">
                                    <div class="col-1 mt-3">
                                        <label for="tren${i}">Tren:</label>
                                        <input type="text" value="${i}" class="form-control" readonly>
                                    </div>
                                    <div class="col-3 mt-3">
                                        <label for="ruta${i}">Ruta:</label>
                                        <input type="text" name="trenes[${i}][ruta]" class="form-control" required>
                                    </div>
                                    <div class="col-2 mt-3">
                                        <label for="compania${i}">Compañía:</label>
                                        <input type="text" name="trenes[${i}][compania]" class="form-control" required>
                                    </div>
                                    <div class="col-2 mt-3">
                                        <label for="servicio${i}">Servicio:</label>
                                        <input type="text" name="trenes[${i}][servicio]" class="form-control" required>
                                    </div>
                                    <div class="col-2 mt-3">
                                        <label for="fecha${i}">Fecha:</label>
                                        <input type="date" name="trenes[${i}][fecha]" class="form-control" required>
                                    </div>
                                    <div class="col-2 mt-3">
                                        <label for="hora${i}">Hora:</label>
                                        <input type="text" name="trenes[${i}][hora]" class="form-control" required>
                                    </div>
                                </div>
                                <hr>
                            `;
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
                                    <div class="col-md-3 mt-3">
                                        <label for="hotel${i}">Hotel:</label>
                                        <input type="text" name="hoteles[${i}][hotel]" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="col-md-3 col-6 mt-3">
                                        <label for="lugar${i}">Lugar:</label>
                                        <input type="text" name="hoteles[${i}][lugar]" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="col-md-2 col-6 mt-3">
                                        <label for="acomodacion${i}">Acomodación:</label>
                                        <input type="text" name="hoteles[${i}][acomodacion]" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="col-md-2 col-6 mt-3">
                                        <label for="fechaIngreso${i}">Fecha de ingreso:</label>
                                        <input type="date" name="hoteles[${i}][fechaIngreso]" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="col-md-2 col-6 mt-3">
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
                    window.addEventListener('DOMContentLoaded', (event) => {
                        calcularRestante();
                    });

                    function calcularRestante() {
                        var precio = parseFloat(document.getElementById('precio').value) || 0;
                        var adelanto = parseFloat(document.getElementById('adelanto').value) || 0;
                        var restante = precio - adelanto;
                        document.getElementById('restante').value = restante;
                    }
                </script>

                <div class="row mt-4">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        <a href="{{ route('reportes.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
