<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisteredAdminController extends Controller
{   public function create()
    {
        return view('auth.register-admin');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'identification' => 'required|numeric|unique:admins',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $admin = Admin::create([
            'name' => $request->name,
            'lastName' => $request->lastName,
            'identification' => $request->identification,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Puedes personalizar esto según tus necesidades, como enviar correos electrónicos de verificación, etc.
        
        return redirect()->route('admin.login')->with('success', 'Registro exitoso. Por favor, inicia sesión.');
    }
}
