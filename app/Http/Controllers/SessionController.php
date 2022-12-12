<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function create()
    {
        if (Auth::check()) {
            return redirect()->to('/admin/dashboard');
        } else {
            return view('auth.login');
        }
    }

    public function store()
    {
        if (auth()->attempt(request(['correo', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'Datos incorrectos, intenta de nuevo'
            ]);
        }
        return redirect()->to('/admin/dashboard');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->to('/');
    }
}
