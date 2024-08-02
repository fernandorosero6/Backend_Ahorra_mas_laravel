<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Presupuesto extends Model
{
    use HasFactory;

    protected $table = 'presupuestos';

    protected $fillable = [
        'contador_id',
        'servicio',
        'valor_gasto'
    ];


    public function historial(){
        return $this->HasMany('App\Models\historial');
    }

}
