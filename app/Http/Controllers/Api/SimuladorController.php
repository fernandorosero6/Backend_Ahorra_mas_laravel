<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Consumo;
use App\Models\Presupuesto;
use App\Models\Simulador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SimuladorController extends Controller
{
    public function index(){
        $simulador = Simulador::all();

        if($simulador->isEmpty()){
            $data = [
                'message' => 'no se encontro el simulador',
                'status'  => 404
            ];

            return response()->json($data, 404);
        }else{
            $data = [
                'message'  => 'se encontraron estos simuladores',
                'simulador'=> $simulador
            ];
            return response()->json($data, 200);
        }
    }

    //en el metodo store validamos que los datos sean correctos
    //luego llamamos la funcion promedioConsumo y le pasamos la validacion para que 
    //realice el promedio y nos devuelva el mismo, luego solo subimnos a la base de datos

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'presupuesto_id' => 'required|integer',
            'alcantarillado' => 'required|numeric',
            'cargo_fijo'     => 'required|numeric'
        ]);

        if($validator->fails())
        {
            $data = [
                'message' => 'datos ingresados erroneos',
                'error'   => $validator->errors()
            ];
            return response()->json($data,400);

        }else{

            $validatorData = $validator->validated();

            $result= $this->promedioConsumo($validatorData);

            if (isset($result['message'])) {
                // Si hay un mensaje de error, devuelves una respuesta JSON con ese mensaje
                return response()->json(['message' => $result['message']], $result['status'] ?? 500);
            }
            
           

            $consumoPromedio = $result['consumoPromedio'];
            $consumoEnM3     = $result['consumoEnM3'];

            $simulador = new Simulador;
            $simulador->presupuesto_id = $validatorData['presupuesto_id'];
            $simulador->consumo_m3   = $consumoEnM3;
            $simulador->consumo_promedio = $consumoPromedio;
            $simulador->save();

            $data = [
                'message'                   => 'este es el consumo que debes tener este mes',
                'consumo promedio m3'       => $consumoPromedio,
                'consumo en m3 de este mes' => $consumoEnM3
            ];
            return response()->json($data, 200);
        }

        
    }

    //esta funcion lo que hace es recibir el $validatorData del store de arriba que tiene
    //los datos correctos que se necesitan para el calculo y 
    //hace el calculo del promedio para luego retornanrlo arriba

    public function promedioConsumo($validatorData)
    {
        $presupuestoId  = $validatorData['presupuesto_id'];
        $alcantarillado = $validatorData['alcantarillado'];
        $cargoFijo      = $validatorData['cargo_fijo'];

        $presupuesto = Presupuesto::find($presupuestoId);
            if(!$presupuesto)
            {
                $data = [
                    'message' => 'no se encontro el presupuesto',
                    'status'  => '404'
                ];
                
            }else{
                $consumoEnPesos  = $alcantarillado + $cargoFijo;
                $valorGasto = $presupuesto->valor_gasto;
                $valorM3= 13.453;

                $consumoEnM31 = $valorGasto-$consumoEnPesos;
                $consumoEnM3  = $consumoEnM31/$valorM3;

                $consumo = Consumo::pluck('consumo_m3');

                if($consumo->isEmpty()){
                    return ['message' => 'No hay datos de consumo disponibles'];
                }else{
                   $consumoTotal = $consumo->sum();
                   $consumoPromedio= $consumoTotal/$consumo->count();

                   return [
                        'consumoPromedio' => $consumoPromedio,
                        'consumoEnM3'     => $consumoEnM3
                    ];
                }
            }
    }
}
