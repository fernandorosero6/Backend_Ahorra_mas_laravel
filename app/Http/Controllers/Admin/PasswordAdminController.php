<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordAdminController extends Controller
{
     public function updatePassword(Request $request, $id)
    {
        $user = Admin::find($id);

        if (!$user) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        
        $user->password = bcrypt($request->input('password'));
        $user->save(); 

        return response()->json(['message' => 'Contraseña actualizada correctamente']);
    }
}
