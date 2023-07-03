<?php

namespace App\Http\Controllers;

use App\Mail\ReporteMail;
use App\Models\Hotel;
use App\Models\Pasajero;
use App\Models\Reporte;
use App\Models\Trenes;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reportes = Reporte::with('pasajeros')->get();
        return view('reportes.index', compact('reportes'));
    }
    
    public function enviarCorreo($id)
    {
        $reporte = Reporte::findOrFail($id);
        $correo = new ReporteMail($reporte);
        Mail::to($reporte->email)->send($correo);
        return redirect()->back()->with('success', 'Email enviado com sucesso para: ' . $reporte->email);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reportes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tour' => 'required',
            'nombre' => 'required',
            'email' => 'required|email',
            'numero' => 'required',
            'llegada' => 'required',
            'salida' => 'required',
            'fechaInicio' => 'required|date',
            'briefing' => 'nullable',
            'numPaxs' => 'nullable|integer',
            'precio' => 'nullable|numeric',
            'adelanto' => 'nullable|numeric',
            'detalles' => 'nullable',

            'pasajeros' => 'nullable|array',
            'pasajeros.*.nombre' => 'required',
            'pasajeros.*.fechaNacimiento' => 'required',
            'pasajeros.*.numeroPasaporte' => 'required',
            'pasajeros.*.nacionalidad' => 'required',
            'pasajeros.*.alimentacion' => 'required',

            'trenes' => 'nullable|array',
            'trenes.*.ruta' => 'required',
            'trenes.*.compania' => 'required',
            'trenes.*.servicio' => 'required',
            'trenes.*.fecha' => 'required|date',
            'trenes.*.hora' => 'required',

            'hoteles' => 'nullable|array',
            'hoteles.*.hotel' => 'required',
            'hoteles.*.lugar' => 'required',
            'hoteles.*.acomodacion' => 'required',
            'hoteles.*.fechaIngreso' => 'required|date',
            'hoteles.*.fechaSalida' => 'required|date',
        ]);

        $reporte = new Reporte();
        $reporte->tour = $request->input('tour');
        $reporte->nombre = $request->input('nombre');
        $reporte->email = $request->input('email');
        $reporte->numero = $request->input('numero');
        $reporte->llegada = $request->input('llegada');
        $reporte->salida = $request->input('salida');
        $reporte->fechaInicio = $request->input('fechaInicio');
        $reporte->briefing = $request->input('briefing');
        $reporte->numPaxs = $request->input('numPaxs');
        $reporte->precio = $request->input('precio');
        $reporte->adelanto = $request->input('adelanto');
        $reporte->detalles = $request->input('detalles');
        $reporte->save();
        if ($request->has('pasajeros')) {
            foreach ($request->pasajeros as $datosPasajero) {
                $pasajero = new Pasajero();
                $pasajero->nombre = htmlspecialchars($datosPasajero['nombre']);
                $pasajero->fechaNacimiento = htmlspecialchars($datosPasajero['fechaNacimiento']);
                $pasajero->numeroPasaporte = htmlspecialchars($datosPasajero['numeroPasaporte']);
                $pasajero->nacionalidad = htmlspecialchars($datosPasajero['nacionalidad']);
                $pasajero->alimentacion = htmlspecialchars($datosPasajero['alimentacion']);
                $reporte->pasajeros()->save($pasajero);
            }
        }
        if ($request->has('trenes') && is_array($request->trenes)) {
            foreach ($request->trenes as $datosTren) {
                $tren = new Trenes();
                $tren->ruta = htmlspecialchars($datosTren['ruta']);
                $tren->compania = htmlspecialchars($datosTren['compania']);
                $tren->servicio = htmlspecialchars($datosTren['servicio']);
                $tren->fecha = $datosTren['fecha'];
                $tren->hora = htmlspecialchars($datosTren['hora']);
                $reporte->trenes()->save($tren);
            }
        }
        if ($request->has('hoteles') && is_array($request->hoteles)) {
            foreach ($request->hoteles as $datosHotel) {
                $hotel = new Hotel();
                $hotel->hotel = htmlspecialchars($datosHotel['hotel']);
                $hotel->lugar = htmlspecialchars($datosHotel['lugar']);
                $hotel->acomodacion = htmlspecialchars($datosHotel['acomodacion']);
                $hotel->fechaIngreso = $datosHotel['fechaIngreso'];
                $hotel->fechaSalida = $datosHotel['fechaSalida'];
                $reporte->hoteles()->save($hotel);
            }
        }

        return redirect()->route('reportes.index')->with('success', 'Reporte creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reporte = Reporte::findOrFail($id);
        $pasajeros = $reporte->pasajeros;

        return view('reportes.show', compact('reporte', 'pasajeros'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function edit(Reporte $reporte)
    {
        return view('reportes.edit', compact('reporte'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $request->validate([
            'tour' => 'required',
            'nombre' => 'required',
            'email' => 'required|email',
            'numero' => 'required',
            'llegada' => 'required',
            'salida' => 'required',
            'fechaInicio' => 'required|date',
            'briefing' => 'nullable',
            'numPaxs' => 'nullable|integer',
            'precio' => 'nullable|numeric',
            'adelanto' => 'nullable|numeric',
            'detalles' => 'nullable',
            'pasajeros' => 'nullable|array',
            'pasajeros.*.nombre' => 'nullable',
            'pasajeros.*.fechaNacimiento' => 'nullable',
            'pasajeros.*.numeroPasaporte' => 'nullable',
            'pasajeros.*.nacionalidad' => 'nullable',
            'pasajeros.*.alimentacion' => 'nullable',
            'trenes' => 'nullable|array',
            'trenes.*.ruta' => 'required',
            'trenes.*.compania' => 'required',
            'trenes.*.servicio' => 'required',
            'trenes.*.fecha' => 'required|date',
            'trenes.*.hora' => 'required',
            'hoteles' => 'nullable|array',
            'hoteles.*.hotel' => 'required',
            'hoteles.*.lugar' => 'required',
            'hoteles.*.acomodacion' => 'required',
            'hoteles.*.fechaIngreso' => 'required',
            'hoteles.*.fechaSalida' => 'required',
        ]);

        $reporte = Reporte::findOrFail($id);
        $reporte->tour = $request->input('tour');
        $reporte->nombre = $request->input('nombre');
        $reporte->email = $request->input('email');
        $reporte->numero = $request->input('numero');
        $reporte->llegada = $request->input('llegada');
        $reporte->salida = $request->input('salida');
        $reporte->fechaInicio = $request->input('fechaInicio');
        $reporte->briefing = $request->input('briefing');
        $reporte->numPaxs = $request->input('numPaxs');
        $reporte->precio = $request->input('precio');
        $reporte->adelanto = $request->input('adelanto');
        $reporte->detalles = $request->input('detalles');
        $reporte->save();

        $reporte->pasajeros()->delete();
        if ($request->has('pasajeros')) {
            foreach ($request->pasajeros as $datosPasajero) {
                $pasajero = new Pasajero();
                $pasajero->nombre = htmlspecialchars($datosPasajero['nombre']);
                $pasajero->fechaNacimiento = htmlspecialchars($datosPasajero['fechaNacimiento']);
                $pasajero->numeroPasaporte = htmlspecialchars($datosPasajero['numeroPasaporte']);
                $pasajero->nacionalidad = htmlspecialchars($datosPasajero['nacionalidad']);
                $pasajero->alimentacion = htmlspecialchars($datosPasajero['alimentacion']);
                $reporte->pasajeros()->save($pasajero);
            }
        }

        $reporte->trenes()->delete();
        if ($request->has('trenes')) {
            foreach ($request->trenes as $datosTren) {
                $tren = new Trenes();
                $tren->ruta = htmlspecialchars($datosTren['ruta']);
                $tren->compania = htmlspecialchars($datosTren['compania']);
                $tren->servicio = htmlspecialchars($datosTren['servicio']);
                $tren->fecha = $datosTren['fecha'];
                $tren->hora = htmlspecialchars($datosTren['hora']);
                $reporte->trenes()->save($tren);
            }
        }
        $reporte->hoteles()->delete();
        if ($request->has('hoteles')) {
            foreach ($request->hoteles as $datosHotel) {
                $hotel = new Hotel();
                $hotel->hotel = htmlspecialchars($datosHotel['hotel']);
                $hotel->lugar = htmlspecialchars($datosHotel['lugar']);
                $hotel->acomodacion = htmlspecialchars($datosHotel['acomodacion']);
                $hotel->fechaIngreso = $datosHotel['fechaIngreso'];
                $hotel->fechaSalida = $datosHotel['fechaSalida'];
                $reporte->hoteles()->save($hotel);
            }
        }

        return redirect()->route('reportes.index')->with('success', 'Reporte actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reporte  $reporte
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reporte $reporte)
    {
        $reporte->delete();
        return redirect()->route('reportes.index')->with('success', 'Reporte eliminado exitosamente');
    }

}