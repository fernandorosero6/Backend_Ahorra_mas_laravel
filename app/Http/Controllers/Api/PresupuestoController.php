<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Presupuesto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PresupuestoController extends Controller
{
    public function index(){
        $presupuesto = Presupuesto::all();
        if($presupuesto->isEmpty()){
            $data = [
                'message' => 'no existen prespuestos creados',
                'status'  => 400
            ];
            return response()->json($data, 400);
        }else{
            $data = [
                'message'    => 'se encontraron estos presupuestos',
                'presupuesto'=> $presupuesto
            ];
            return response()->json($data,200);
        }
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'contador_id' => 'required',
            'servicio'    => 'required',
            'valor_gasto' => 'required|numeric'
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en las validaciones',
                'error'   => $validator->errors(),
                'status'  => 400
            ];
            return response()->json($data, 400);
        }else{

            $presupuesto = Presupuesto::create($request->all());
            $presupuestoId = $presupuesto->id;
            $data = [
                'message'    => 'se creo correctamente el presupuesto',
                'presupuesto'=> $presupuesto,
                'id del presupuesto crado' => $presupuestoId
            ];
            return response()->json($data, 200);
        }
    }

    public function show($presupuestos)
    {
        $presupuesto = Presupuesto::find($presupuestos);

        if(!$presupuesto){
            $data = [
                'message' => 'no se encontro el presupuesto',
                'status'  => 404
            ];
            return response()->json($data,404);
        }else{
            $data = [
                'message'   => 'se encontro el presupuesto',
                'presupusto'=> $presupuesto
            ];
            return response()->json($data, 200);
        }
    }

    public function destroy($presupuestos)
    {
        $presupuesto = Presupuesto::find($presupuestos);
        
        if(!$presupuesto){
            $data = [
                'message' => 'no se encontro el presupuesto',
                'status'  => 404
            ];
            return response()->json($data,404);
        }else{
            $data = [
                'message'     => 'presupuesto eliminado',
                'presupuesto' => $presupuesto
            ];
            $presupuesto->delete();
            return response()->json($data,200);
        }
    }

    public function update(Request $request, $presupuestos)
    {
        $presupuesto = Presupuesto::find($presupuestos);

        if(!$presupuesto){
            $data = [
                'message' => 'no se encontro el presupuesto',
                'status'  => 404
            ];
            return response()->json($data, 404);
        }else{
            $validator = Validator::make($request->all(),[
                'contador_id' => 'required',
                'servicio'    => 'required',
                'valor_gasto' => 'required'
            ]);

            if($validator->fails()){
                $data = [
                    'message' => 'error en los datos ingresados',
                    'error'   => $validator->errors()
                ];
                return response()->json($data,404);
            }else{
                $presupuesto->contador_id = $request->contador_id;
                $presupuesto->servicio    = $request->servicio;
                $presupuesto->valor_gasto = $request->valor_gasto;
                $presupuesto->save();

                $data = [
                    'message'    => 'el presupuesto fue actualizado correctamente',
                    'presupuesto'=> $presupuesto
                ];
                return response($data, 200);
            }
        }
    }
}
















