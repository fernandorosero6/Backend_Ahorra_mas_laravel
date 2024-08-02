<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;

class VerifyEmailAdminController extends Controller
{
    public function __invoke(Request $request)
    {
        if ($request->route('id') != $request->user('admin')->getKey()) {
            throw new AuthorizationException();
        }

        if ($request->user('admin')->hasVerifiedEmail()) {
            return redirect()->intended('/admin/dashboard'); // Redirige a la ruta deseada después de la verificación
        }

        if ($request->user('admin')->markEmailAsVerified()) {
            event(new Verified($request->user('admin')));
        }

        return redirect()->route('admin.verification.notice')->with('verified', true);
    }
}
