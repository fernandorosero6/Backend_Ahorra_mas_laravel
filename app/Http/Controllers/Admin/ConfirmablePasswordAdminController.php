<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfirmablePasswordAdminController extends Controller
{
    public function show()
    {
        return view('admin.confirm-password');
    }

}
