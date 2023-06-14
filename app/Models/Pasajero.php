<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasajero extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'fechaNacimiento',
        'numeroPasaporte', 
        'nacionalidad',
        'alimentacion',
        'reporte_id',
    ];

    public function reporte()
    {
        return $this->belongsTo(Reporte::class);
    }
}
