<?php

namespace App\Http\Controllers;

use App\Models\Contador;
use Illuminate\Http\Request;
use ConsoleTVs\Charts\Facades\Charts;


class ChartController extends Controller
{
    
    public function index(){
        
        return view('chart');
    }
}
