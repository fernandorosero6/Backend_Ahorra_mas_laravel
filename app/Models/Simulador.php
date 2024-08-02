<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simulador extends Model
{
    use HasFactory;

    protected $table = 'simulador';

    protected $fillable = [
        'presupuesto_id', 
        'consumo_m3', 
        'consumo_promedio'
    ];

}
