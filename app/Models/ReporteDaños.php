<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReporteDaños extends Model
{
    use HasFactory;

    public function Contador(){
        return $this->belongsToMany(Contador::class, 'contador_reporte_daños', 'reporte_daños_id', 'contador_id');
    }
}
