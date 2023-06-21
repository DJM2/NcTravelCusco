<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = 'hoteles';
    use HasFactory;
    protected $fillable = [
        'hotel',
        'lugar',
        'acomodacion',
        'fechaIngreso',
        'fechaSalida',
    ];
    public function reporte()
    {
        return $this->belongsTo(Reporte::class);
    }
}
