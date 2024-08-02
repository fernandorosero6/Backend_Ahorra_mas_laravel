<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;

class RegistroController extends Controller
{
    public function RegistroIndex() {
        return view('IniciarSesion.Registro');
    }

    Public function RegsitroStore(Request $request){

        $registro = new Registro;
        $registro -> name = $request->input('name');
        $registro -> lastName = $request->input('lastName');
        $registro -> identification = $request ->input('identification');
        $registro -> email = $request ->input('email');
        $registro -> password = $request ->input('password');
        $registro -> confirmPassword = $request ->input('confirmPassword');
        $registro -> save();


        // $producto->nombre = $request->input('nombre');
    }

}
