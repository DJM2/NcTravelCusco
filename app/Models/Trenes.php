<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trenes extends Model
{
    use HasFactory;
    protected $fillable = [
        'ruta',
        'compania',
        'servicio', 
        'fecha',
        'hora',
    ];
    public function reporte()
    {
        return $this->belongsTo(Reporte::class);
    }
}
