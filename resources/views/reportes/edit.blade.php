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
                    <div class="col-6 mt-3">
                        <label for="tour">Paquete turístico:</label>
                        <input type="text" name="tour" class="form-control" value="{{ $reporte->tour }}" required>
                    </div>
                    <div class="col-6 mt-3">
                        <label for="nombre">Nombre Pasajero:</label>
                        <input type="text" name="nombre" class="form-control" value="{{ $reporte->nombre }}" required>
                    </div>
                    <div class="col-3 mt-3">
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="form-control" value="{{ $reporte->email }}" required>
                    </div>
                    <div class="col-3 mt-3">
                        <label for="fechaInicio">Fecha Inicio:</label>
                        <input type="date" name="fechaInicio" class="form-control" value="{{ $reporte->fechaInicio }}" required>
                    </div>
                    <div class="col-3 mt-3">
                        <label for="fechabriefing">Briefing:</label>
                        <input type="date" name="briefing" class="form-control" value="{{ $reporte->briefing }}">
                    </div>
                    <div class="col-3 mt-3">
                        <label for="numPaxs">N° Paxs:</label>
                        <input type="number" name="numPaxs" class="form-control" placeholder="Escoger numero entre 1 a 14" value="{{ $reporte->numPaxs }}" onchange="generarCamposPasajeros(this.value)">
                    </div>
                    <div class="col-4 mt-3">
                        <label for="precio">Precio:</label>
                        <input type="number" name="precio" id="precio" class="form-control" onchange="calcularRestante()" value="{{ $reporte->precio }}">
                    </div>
                    <div class="col-4 mt-3">
                        <label for="adelanto">Adelanto:</label>
                        <input type="number" name="adelanto" id="adelanto" class="form-control" onchange="calcularRestante()" value="{{ $reporte->adelanto }}">
                    </div>
                    <div class="col-4 mt-3">
                        <label for="restante">Restante:</label>
                        <input type="number" name="restante" id="restante" class="form-control" readonly>
                    </div>
                    <div id="contenedorPasajeros" class="col-12 mt-4">
                        @foreach ($reporte->pasajeros as $index => $pasajero)
                            <h4>Pasajero {{ $index + 1 }}</h4>
                            <div class="row">
                                <div class="col-3 mt-3">
                                    <label for="nombre{{ $index }}">Nombre:</label>
                                    <input type="text" name="pasajeros[{{ $index }}][nombre]" class="form-control" value="{{ $pasajero->nombre }}" required>
                                </div>
                                <div class="col-3 mt-3">
                                    <label for="nacionalidad{{ $index }}">Nacionalidad:</label>
                                    <input type="text" name="pasajeros[{{ $index }}][nacionalidad]" class="form-control" value="{{ $pasajero->nacionalidad }}" required>
                                </div>
                                <div class="col-2 mt-3">
                                    <label for="pasaporte{{ $index }}">N° de Pasaporte:</label>
                                    <input type="text" name="pasajeros[{{ $index }}][numeroPasaporte]" class="form-control" value="{{ $pasajero->numeroPasaporte }}" required>
                                </div>
                                <div class="col-2 mt-3">
                                    <label for="nacimiento{{ $index }}">Fecha de nacimiento:</label>
                                    <input type="date" name="pasajeros[{{ $index }}][fechaNacimiento]" class="form-control" value="{{ $pasajero->fechaNacimiento }}" required>
                                </div>
                                <div class="col-2 mt-3">
                                    <label for="alimentacion{{ $index }}">Alimentación:</label>
                                    <select name="pasajeros[{{ $index }}][alimentacion]" class="form-control" required>
                                        <option value="vegano" {{ $pasajero->alimentacion === 'vegano' ? 'selected' : '' }}>Vegano</option>
                                        <option value="no_vegano" {{ $pasajero->alimentacion === 'no_vegano' ? 'selected' : '' }}>No Vegano</option>
                                    </select>
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
                        contenedorPasajeros.innerHTML = ''; // Limpiar el contenedor

                        for (var i = 1; i <= numeroPasajeros; i++) {
                            contenedorPasajeros.innerHTML += `
            <h4>Pasajero ${i}</h4>
            <div class="row">
                <div class="col-3 mt-3">
                    <label for="nombre${i}">Nombre:</label>
                    <input type="text" name="pasajeros[${i}][nombre]" class="form-control" required>
                </div>
                <div class="col-3 mt-3">
                    <label for="nacionalidad${i}">Nacionalidad:</label>
                    <input type="text" name="pasajeros[${i}][nacionalidad]" class="form-control" required>
                </div>
                <div class="col-2 mt-3">
                    <label for="pasaporte${i}">N° de Pasaporte:</label>
                    <input type="text" name="pasajeros[${i}][numeroPasaporte]" class="form-control" required>
                </div>
                <div class="col-2 mt-3">
                    <label for="nacimiento${i}">Fecha de nacimiento:</label>
                    <input type="date" name="pasajeros[${i}][fechaNacimiento]" class="form-control" required>
                </div>
                <div class="col-2 mt-3">
                    <label for="alimentacion${i}">Preferencia Alimenticia:</label>
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