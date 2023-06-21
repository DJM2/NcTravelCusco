<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Reporte extends Model
{
    protected $fillable = [
        'tour',
        'nombre',
        'email',
        'numero',
        'llegada',
        'salida',
        'fechaInicio', 
        'briefing',
        'numPaxs',
        'precio',
        'adelanto',
        'detalles',
    ];

    public function pasajeros()
    {
        return $this->hasMany(Pasajero::class);
    }
    public function trenes()
    {
        return $this->hasMany(Trenes::class);
    }
    public function hoteles()
    {
        return $this->hasMany(Hotel::class);
    }
}
