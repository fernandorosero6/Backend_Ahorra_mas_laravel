<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Register;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){

        $register = Register::all();
        if ($register->isEmpty()){
            $data = [
                'message' => 'No se encontraron Registros',
                'status' => 200
            ];
            return response()->json($data, 404);
        }
        return response()->json($register, 200);   
       
    }

    //en esta funcion lo que se hace es validar los datos luego se verifica que si fallo los datos se manda 
    //el mensaje de erro y si no fallo la verificacion se crea el registro

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'           => 'required|string|between:1,255',
            'lastName'       => 'required|string|between:1,255',
            'email'          => 'required|email|unique:register',
            'identification' => 'required|digits_between:6,8', 
            'password'       => 'required|string|between:8,15',
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Los datos ingresados estan incorrectos',
                'errors'  => $validator->errors(),
                'status'  => 400
            ];
            return response()->json($data, 400);

        }else{

            $register = Register::create($request->all());
            return response($register, 200);
            $data = [
                'messege' => 'se creo correctamente el usuario', 
                'status'  => 200
            ];
        }
    }

    //en esta funcion se encuntra el registro se verifica que lo encuntre y luego se muestra 

    public function show($registro){
        $register = Register::find($registro);

        if(!$register){
            $data = [
                'message' => 'registro no encontrado',
                'status'  => 404
            ];
            return response()->json($data, 404);

        }else{
            $data = [
                'message' => $register,
                'status'  => 200
            ];
            return response()->json($data, 200);
        }
    }

    //en esta funcion solo se busca el registro, si no se encuentra manda un mensaje de error y si si borra 
    //muestra el error 

    public function destroy($registro){
        $register = Register::find($registro);

        if(!$register){
            $data = [
                'message' => 'registro no encontrado',
                'status'  => 404
            ];

            return response()->json($data, 404);

        }else{
            $data = [
                'message' => 'registro eliminado',
                'Registro eliminado' => $register,
                'status'  => 200
            ];
            $register->delete();
            return response()->json($data, 200);
        }
    }

    //En esta funcion se encuentra el registro se valida, se validan los datos que quiren cambiar
    // si hay errores manda un mensaje con los errores y si no falla se asignan los nuevos datos 

    public function update(Request $request, $registro){
        $register = Register::find($registro);

        if(!$register){
            $data = [
                'message' => 'registro no encontrado',
                'status'  => 404
            ];

            return response()->json($data, 404);

        }else{

            $validator = Validator::make($request->all(),[
                'name'           => 'required|string|between:1,255',
                'lastName'       => 'required|string|between:1,255',
                'email'          => 'required|email|unique:register',
                'identification' => 'required|digits_between:6,8', 
                'password'       => 'required|string|between:8,15',
            ]);

            if($validator->fails()){
                $data = [
                    'message' => 'Los datos ingresados estan incorrectos',
                    'errors'  => $validator->errors(),
                    'status'  => 400
                ];
                return response()->json($data, 400);
    
            }else{

                $register->name = $request->name;
                $register->lastName = $request->lastName;
                $register->email = $request->email;
                $register->identification = $request->identification;
                $register->password = $request->password;
                $register->save();

                $data = [
                    'messege' => 'se actualizo correctamente el usuario', 
                    'update'  => $register,
                    'status'  => 200
                ];
                return response($data, 200);

            }


        }

    }

}
