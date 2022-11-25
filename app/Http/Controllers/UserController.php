<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Municipalidades;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();

        return view('users.index', compact('users'));
    }

    public function registrar()
    {
        $munis = Municipalidades::all();
        
        return view('users.registrar', compact('munis'));        
    }
}
