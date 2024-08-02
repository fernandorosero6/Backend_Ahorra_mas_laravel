<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function index(){
        return redirect()->route('admin.create');
    }


    public function create(){
        return view('/admin.loginAdmin');
    }

    public function store(Request $request){
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $admin = Admin::create($request->all());
        return view('Admin.inicioAdmin');   
    }
}
