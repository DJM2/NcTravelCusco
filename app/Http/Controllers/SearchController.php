<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $name = $request->input('name');
        $respuesta = Tour::where('nombre', 'LIKE', "%$name%")->get();
        $numCoincidencias = count($respuesta);

        if ($numCoincidencias != 0) {
            $respuestas = [
                'respuestas' => $respuesta,
                'numCoincidencias' => $numCoincidencias,
            ];
            return view('es.search', $respuestas);
        } else {
            return view('es.noresults');
        }
    }
}