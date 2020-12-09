<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class dashboardController extends Controller
{
    public function show()
    {
        //$users = DB::table('users')->paginate(15);
        $user = Auth::user()->name;
        return view('dashboard', ['username' => $user]);
    }
    public function showtest()
    {

        $items = DB::table('item')->paginate();
        // Ici on change le nombre de résultat qu'on veux voir apparaitre sur la page
        $user = Auth::user()->name;
        return view('dashboardtest', array ( 'items' => $items ))->with('username',$user);
        // Autre possibilité ici : return view('Visu')->with('items',$items);
    }
}
