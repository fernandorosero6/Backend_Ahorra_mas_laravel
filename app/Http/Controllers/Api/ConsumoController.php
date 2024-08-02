<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Consumo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConsumoController extends Controller
{
    public function index()
    {
      
        $consumo = Consumo::all();

        if($consumo->isEmpty()){
            $data = [
                'message' => 'No se encontraron consumos',
                'status'  => 404
            ];
            return response()->json($data, 404);
        }else{
            $data = [
                'message' => 'se encontraron estos consumos',
                'consumo' => $consumo
            ];
            return response()->json($data, 200);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'contador_id' => 'required',
            'consumo_m3'  => 'required',
            'consumo_pesos' => 'required'
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Existen errores en los datos',
                'error'   => $validator->errors(),
            ];
            return response()->json($data, 400);
        }else{

            $consumo = Consumo::create($request->all());
            $data = [
                'message' => 'se creo exitosamente un consumo',
                'consumo' => $consumo
            ];
            return response()->json($data, 200);
        }
    }

    public function show($consumos)
    {
        $consumo = Consumo::find($consumos);
        if(!$consumo){
            $data = [
                'message' => 'El consumo no fue encontrado',
                'status'  => 404
            ];
            return response()->json($data, 404);
        }else{
            $data = [
                'message' => 'El consumo fue encontrado correctamente',
                'consumo' => $consumo
            ];
            return response()->json($data, 200);
        }
    }


    public function destroy($consumos)
    {
        $consumo = Consumo::find($consumos);

        if(!$consumo){
            $data = [
                'message' => 'el consumo no fue encontrado',
                'status'  => 404
            ];
            return response()->json($data, 404);
        }else{
            $data = [
                'message'            => 'se elimino exitosamente el consumo',
                'contador eliminado' => $consumo,
                'status'             => 200
            ];
            $consumo->delete();
            return response()->json($data, 200);
        }
    }



    public function update(Request $request, $consumos)
    {
        $consumo = Consumo::find($consumos);

        if(!$consumo){
            $data = [
                'message' => 'consumo no encontrado',
                'status'  => 400
            ];
            return response()->json($data, 400);
        }else{
            $validator = Validator::make($request->all(),[
                'contador_id' => 'required',
                'consumo_m3'  => 'required',
                'consumo_pesos'=>'required'
            ]);

            if($validator->fails()){
                $data = [
                    'message' => 'errores en los datos proporcionados',
                    'error'   => $validator->errors(),
                    'status'  => 400
                ];
            }else{
                $consumo->contador_id= $request->contador_id;
                $consumo->consumo_m3 = $request->consumo_m3;
                $consumo->consumo_pesos=$request->consumo_pesos;
                $consumo->save();
                $data = [
                    'message' => 'consumo actualizado exitosamente',
                    'consumo'   => $consumo,
                    'status'  => 200
                ];
                return response()->json($data, 200);
            }

        }

    }
}
