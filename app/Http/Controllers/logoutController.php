<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class logoutController extends Controller
{
    public function logout()
    {
        /*
            Fonction logout
            Ici, nous déconnectons l'utilisateur et le renvoyons sur la vue deco (deconnexion)
        */
        Auth::logout();
        return view('deco');
    }
}
