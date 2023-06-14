<?php

namespace App\Http\Controllers;

use App\Models\Pasajero;
use App\Models\Reporte;
use Illuminate\Http\Request;

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
            'fechaInicio' => 'required|date',
            'briefing' => 'nullable',
            'numPaxs' => 'nullable|integer',
            'precio' => 'nullable|numeric',
            'adelanto' => 'nullable|numeric',
            'detalles' => 'nullable',
            'pasajeros' => 'required|array',
            'pasajeros.*.nombre' => 'required',
            'pasajeros.*.fechaNacimiento' => 'required',
            'pasajeros.*.numeroPasaporte' => 'required',
            'pasajeros.*.nacionalidad' => 'required',
            'pasajeros.*.alimentacion' => 'required',
        ]);

        $reporte = new Reporte();
        $reporte->tour = $request->input('tour');
        $reporte->nombre = $request->input('nombre');
        $reporte->email = $request->input('email');
        $reporte->fechaInicio = $request->input('fechaInicio');
        $reporte->briefing = $request->input('briefing');
        $reporte->numPaxs = $request->input('numPaxs');
        $reporte->precio = $request->input('precio');
        $reporte->adelanto = $request->input('adelanto');
        $reporte->detalles = $request->input('detalles');
        $reporte->save();

        foreach ($request->pasajeros as $datosPasajero) {
            $pasajero = new Pasajero();
            $pasajero->nombre = htmlspecialchars($datosPasajero['nombre']);
            $pasajero->fechaNacimiento = htmlspecialchars($datosPasajero['fechaNacimiento']);
            $pasajero->numeroPasaporte = htmlspecialchars($datosPasajero['numeroPasaporte']);
            $pasajero->nacionalidad = htmlspecialchars($datosPasajero['nacionalidad']);
            $pasajero->alimentacion = htmlspecialchars($datosPasajero['alimentacion']);
            $reporte->pasajeros()->save($pasajero);
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
            'fechaInicio' => 'required|date',
            'briefing' => 'nullable',
            'numPaxs' => 'nullable|integer',
            'precio' => 'nullable|numeric',
            'adelanto' => 'nullable|numeric',
            'detalles' => 'nullable',
            'pasajeros' => 'required|array',
            'pasajeros.*.nombre' => 'required',
            'pasajeros.*.fechaNacimiento' => 'required',
            'pasajeros.*.numeroPasaporte' => 'required',
            'pasajeros.*.nacionalidad' => 'required',
            'pasajeros.*.alimentacion' => 'required',
        ]);

        $reporte = Reporte::findOrFail($id);
        $reporte->tour = $request->input('tour');
        $reporte->nombre = $request->input('nombre');
        $reporte->email = $request->input('email');
        $reporte->fechaInicio = $request->input('fechaInicio');
        $reporte->briefing = $request->input('briefing');
        $reporte->numPaxs = $request->input('numPaxs');
        $reporte->precio = $request->input('precio');
        $reporte->adelanto = $request->input('adelanto');
        $reporte->detalles = $request->input('detalles');
        $reporte->save();

        $reporte->pasajeros()->delete();

        foreach ($request->pasajeros as $datosPasajero) {
            $pasajero = new Pasajero();
            $pasajero->nombre = htmlspecialchars($datosPasajero['nombre']);
            $pasajero->fechaNacimiento = htmlspecialchars($datosPasajero['fechaNacimiento']);
            $pasajero->numeroPasaporte = htmlspecialchars($datosPasajero['numeroPasaporte']);
            $pasajero->nacionalidad = htmlspecialchars($datosPasajero['nacionalidad']);
            $pasajero->alimentacion = htmlspecialchars($datosPasajero['alimentacion']);
            $reporte->pasajeros()->save($pasajero);
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