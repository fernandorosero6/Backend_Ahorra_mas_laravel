<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    use HasFactory;

    public function presupuesto(){
        return $this->belongsTo('App\Models\presupuesto');
    }

    public function Contador(){
        return $this->belongsTo('App\Models\Contador');
    }
    public function alert(){
        return $this->belongsTo('App\Models\Alert');
    }

}
