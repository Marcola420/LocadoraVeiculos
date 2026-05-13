<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario; // Lembre de criar o Model Usuario ou usar DB
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function showLogin() {
        return view('login');
    }

    public function login(Request $request) {
        $user = DB::table('usuarios')
            ->where('login', $request->login)
            ->where('senha', $request->senha)
            ->first();

        if ($user) {
            session(['usuario' => $user]); // Guarda o usuário na sessão
            return redirect()->route('carros.index');
        }

        return back()->with('erro', 'Login ou senha inválidos!');
    }

    public function logout() {
        session()->forget('usuario');
        return redirect()->route('login');
    }
}