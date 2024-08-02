<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        $login = Login::all();

        if($login->isEmpty()){
            $data = [
                'message' => 'no se encontraron logins',
                'status'  => 404
            ];
            return response()->json($data,404);
        }else{
            $data = [
                'message' => 'se encontro este registro',
                'Login'   => $login,
                'status'  => 200
            ];
            return response()->json($data,200);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'CoD'     => 'required|string',
            'password'=> 'required|string|between:8,15'
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Los datos ingresados son incorretos',
                'errors'  => $validator->errors(),
                'status'  => 400
            ];
            return response()->json($data, 400);
        }else{
            $data = [
                'message' => 'el login fue exitoso',
                'status'  => 200
            ];
            $login = Login::create($request->all());
            return response()->json($data, 200);

        }
    }

    public function  show($logins)
    {
        $login = Login::find($logins);

        if(!$login){
            $data = [
                'message' => 'login no encontrado',
                'status'  => 404
            ];
            return response()->json($data,404);
        }else{
            $data = [
                'message' => 'Login encontrado exitosamente',
                'login'   => $login,
                'status'  => 200
            ];
            return response()->json($data,200);
        }
    }

    public function destroy($logins)
    {  
        $login = Login::find($logins);

        if(!$login){
            $data = [
                'message' => 'No se encontro el login',
                'status ' => 400
            ];
            return response()->json($data,400);
        }else{
            $data = [
                'message' => 'Login borrado exitosamente',
                'login'   => $login,
                'status'  => 200
            ];
            
            $login -> delete();
            return response()->json($data, 200);
        }
    }

    public function update(Request $request, $logins)
    {
        $login = Login::find($logins);

        if(!$login){
            $data = [
                'message' => 'login no encontrado',
                'status'  => 400
            ];
            return response()->json($data, 400);
        }else{
            $validator = Validator::make($request->all(),[
                'CoD'     => 'required|string',
                'password'=> 'required|string|between:8,15' 
            ]);

            if($validator->fails()){
                $data = [
                    'message' => 'errores en los datos proporcionados',
                    'error'   => $validator->errors(),
                    'status'  => 400
                ];
            }else{
                $login->CoD      = $request->CoD;
                $login->password = $request->password;
                $login->save();
                $data = [
                    'message' => 'Login actualizado exitosamente',
                    'Login'   => $login,
                    'status'  => 200
                ];
                return response()->json($data, 200);
            }

        }

    }
}
