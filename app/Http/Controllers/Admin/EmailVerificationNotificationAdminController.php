<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailVerificationNotificationAdminController extends Controller
{
    public function send(Request $request)
    {
        $request->user('admin')->sendEmailVerificationNotification();

        return back()->with('message', 'Se ha enviado el enlace de verificación al correo electrónico.');
    }
}
