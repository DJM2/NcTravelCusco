<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;

class EnlacesCategorias extends Controller
{
    public function machu()
    {
        $tours = Tour::all()->filter(function ($tour) {
            return str_contains($tour->categoria, 'around');
        });
        return view('tours.machu-picchu', compact('tours'));
    }
    public function peru()
    {
        $tours = Tour::all()->filter(function ($tour) {
            return str_contains($tour->categoria, 'hikes');
        });
        return view('tours.pacotes-peru', compact('tours'));
    } 
    public function trilhas()
    {
        $tours = Tour::all()->filter(function ($tour) {
            return str_contains($tour->categoria, 'machupicchu');
        });
        return view('tours.trilha-inca', compact('tours'));
    } 
    public function alternativas()
    {
        $tours = Tour::all()->filter(function ($tour) {
            return str_contains($tour->categoria, 'luxury');
        });
        return view('tours.rotas-alternativas', compact('tours'));
    } 
    public function nosotros(){
        return view('nosotros');
    }
    public function contato(){
        return view('tours.contato');
    }
    public function reserva(){
        return view('tours.reserva');
    }
    public function condicoes(){
        return view('condicoes-gerais');
    }
}