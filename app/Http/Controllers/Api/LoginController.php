<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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

            $CoD = $request->input('CoD');
            $password = $request->input('password');

            $login = DB::table('register')->where('email', $CoD)->first();

            if(!$login){
                $login = DB::table('register')->where('identification', $CoD)->first();
            }

            if($login && Hash::check($password, $login->password)){
                return response()->json([
                    'message' => 'El login fue exitoso',
                    'status'  => 200,
                ], 200);
            }else{
                return response()->json([
                    'message' => 'Las credenciales proporcionadas son incorrectas.',
                    'status'  => 401,
                ], 401);
            }

        }
    }

}
