<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumo extends Model
{
    use HasFactory;

    protected $table = 'consumo';

    protected $fillable = [
        'contador_id',
        'consumo_m3',
        'consumo_pesos'
    ];

    public function contador()
    {
        return $this->belongsTo(Contador::class);
    }
}
