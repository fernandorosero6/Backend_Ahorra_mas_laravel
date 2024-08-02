<?php

namespace App\Http\Controllers;

use App\Models\Contador;
use Illuminate\Http\Request;
use ConsoleTVs\Charts\Facades\Charts;

class GraficoController extends Controller
{
    // public function index()
    // {
    //     // Obtén los datos del modelo
    //     $data = Contador::all(); // Reemplaza YourModel con tu modelo

    //     // Configura el gráfico
    //     // $chart = Charts::create('bar', 'highcharts')
    //     //     ->title('Mi Primer Gráfico')
    //     //     ->elementLabel('Total')
    //     //     ->labels($data->pluck('num_contador')) // Reemplaza nombre_del_campo con el campo de tu modelo que deseas usar como etiqueta
    //     //     ->values($data->pluck('num_contador')) // Reemplaza valor_del_campo con el campo de tu modelo que deseas usar como valor
    //     //     ->dimensions(1000, 500)
    //     //     ->responsive(false);

    //     // Retorna la vista con el gráfico
    //     return view('chart', compact('chart'));
    // }
}
