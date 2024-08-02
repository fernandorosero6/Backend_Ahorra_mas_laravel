<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class NewPasswordAdminController extends Controller
{
    public function updatePassword(Request $request, $id)
    {
        $user = Admin::find($id);

        if (!$user) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        // Actualizar la contraseña
        $user->password = Hash::make($request->input('password'));
        $user->save(); // Asegúrate de que esta línea no esté resaltada en rojo ahora

        return response()->json(['message' => 'Contraseña actualizada correctamente']);
    }
}
