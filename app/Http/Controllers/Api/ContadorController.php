<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Consumo;
use App\Models\Contador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContadorController extends Controller
{
    public function index()
{
    // Obtener los contadores con sus consumos relacionados
    $contadores = Contador::with('consumos')->get();

    // Verificar si hay contadores
    if ($contadores->isEmpty() || $contadores->every(function ($contador) {
        return $contador->consumos->isEmpty();
    })) {
        // Datos de prueba si no hay datos en la base de datos
        $datosDePrueba = [
            [
                'id' => 1,
                'nombre_contador' => 'contador prueba 1',
                'consumos' => [
                    [
                        'consumo_m3' => '10',
                        'consumo_pesos' => '122.000'
                    ]
                ]
            ],
            [
                'id' => 2,
                'nombre_contador' => 'contador prueba 2',
                'consumos' => [
                    [
                        'consumo_m3' => '10',
                        'consumo_pesos' => '122.000'
                    ]
                ]
            ],
            [
                'id' => 3,
                'nombre_contador' => 'contador prueba 3',
                'consumos' => [
                    [
                        'consumo_m3' => '10',
                        'consumo_pesos' => '100.000'
                    ]
                ]
            ]
        ];

        return response()->json($datosDePrueba, 200);
    }

    // Preparar los datos combinados si hay datos en la base de datos
    $datosCombinados = $contadores->map(function ($contador) {
        return [
            'id' => $contador->id,
            'nombre_contador' => $contador->nombre_contador,
            'consumos' => $contador->consumos->map(function ($consumo) {
                return [
                    'consumo_m3' => $consumo->consumo_m3,
                    'consumo_pesos' => $consumo->consumo_pesos,
                ];
            })
        ];
    });

    return response()->json($datosCombinados, 200);
}
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nombre_contador'       => 'required|string|max:255',
            'num_contador'          => 'required|integer|unique:contadors,num_contador',
            'barrio'                => 'required|string|max:255',
            'direccion'             => 'required|string|max:255',
            'estrato'               => 'required|integer',
            'categoria'             => 'required|string|max:255',
            'tarifa_agua'           => 'required|numeric',
            'tarifa_alcantarillado' => 'required|numeric',
            'ultimo_consumo'        => 'required|string',
            'fecha_proximo_pago'    => 'required|string|max:255',
            // 'estado'                => 'required|boolean', descomentar cuando hagamos pruebas con el servidor
            // 'tipo_contador'         => 'required|boolean',
        ]);


        if($validator->fails()){
            $data = [
                'message' => 'los datos ingresados son equivocados',
                'errors'  => $validator->errors(),
                'status'  => 400
            ];
            return response()->json($data, 400);
        }else{
            $contador = Contador::create($request->all());
            $data = [
                'message' => 'contador creado con exito',
                'Contador'=> $contador,
                'status'  => 200,
            ];
            return response($data, 200);
        }
    }

    public function show($contadors)
    {
        $contador = Contador::find($contadors);

        if(!$contador){
            $data = [
                'message' => 'contador no encontrado',
                'status'  => 404
            ];
            return response()->json($data, 404);
        }else{ 
            $data = [
                'messge'   => 'El contador fue encontrado exitosamente',
                'Contador' => $contador,
                'status'   => 200
            ];
            return response()->json($data,200);
        }
    }

    public function destroy($contadors)
    {
        $contador = Contador::find($contadors);

        if(!$contador){
            $data = [
                'message' => 'el contador no fue encontrado',
                'status'  => 404
            ];
            return response()->json($data, 404);
        }else{
            $data = [
                'message'            => 'se elimino exitosamente el contador',
                'contador eliminado' => $contador,
                'status'             => 200
            ];
            $contador->delete();
            return response()->json($data, 200);
        }
    }

    public function update(Request $request, $contadors)
    {
        $contador = Contador::find($contadors);

       if(!$contador){
            $data = [
                'message' => 'el contador no fue encontrado',
                'status'  => 404
            ];
            return response()->json($data, 404);
        }else{
            $validator = Validator::make($request->all(),[
                'nombre_contador'       => 'required|string|max:255',
                'num_contador'          => 'required|integer',
                'barrio'                => 'required|string|max:255',
                'direccion'             => 'required|string|max:255',
                'estrato'               => 'required|integer',
                'categoria'             => 'required|string|max:255',
                'tarifa_agua'           => 'required|numeric',
                'tarifa_alcantarillado' => 'required|numeric',
                'ultimo_consumo'        => 'required|string',
                'fecha_proximo_pago'    => 'required|string|max:255',
            ]);

            if($validator->fails()){
                $data = [
                    'message' => 'hay errores en los datos ingresados',
                    'error'   => $validator->errors(),
                    'status'  => 404
                ];
                return response()->json($data, 404);

            }else{
                $contador->nombre_contador      = $request->nombre_contador;
                $contador->num_contador         = $request->num_contador;
                $contador->barrio               = $request->barrio;
                $contador->direccion            = $request->direccion;
                $contador->estrato              = $request->estrato;
                $contador->categoria            = $request->categoria;
                $contador->tarifa_agua          = $request->tarifa_agua;
                $contador->tarifa_alcantarillado= $request->tarifa_alcantarillado;
                $contador->ultimo_consumo       = $request->ultimo_consumo;
                $contador->fecha_proximo_pago   = $request->fecha_proximo_pago;
                $contador->save();
                
                $data = [
                    'message' => 'se actualizo correctamente',
                    'contador actualizado' => $contador,
                    'status'               => 200
                ];

                return response()->json($data,200);
            }

        }
    }
}
