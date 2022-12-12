<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Municipalidades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

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

    public function show(Request $request)
    {
        $search = $request->search;
        $users = User::with('municipalidades')->where('name', 'LIKE', "%{$search}%")->paginate();
        
        return view('users.view', compact('users'));   
    }

    public function store(Request $request)
    {
        //obtengo datos del formulario
        $name                   = $request->name;
        $municipalidad          = $request->municipalidad;
        $email                  = $request->email;
        $password               = $request->password;
        $password_confirmation  = $request->password_confirmation;

        $messages = [
            'name.required' => 'Campo Nombre no puede ser vacio.',
            'name.max' => 'Campo Nombre máximo de 1000 caracteres.',
            'municipalidad.required' => 'Debe seleccionar una municipalidad.',
            'municipalidad.min' => 'Debe seleccionar una municipalidad.',
            'email.required' => 'El campo email no puede ser vacio.',
            'email.unique' => 'El campo email ya existe en nuestra base.',
            'password.required' => 'El campo Contraseña no puede ser vacio.',
            'password.min' => 'El campo Contraseña debe ser minimo de 8 caracteres.',
            'password.confirmed' => 'La contraseña y la confirmación de contraseña no son identicas.'
        ];

        $camposValidacion = [
            'name' => 'required|string|max:1000',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'municipalidad' => 'required|min:1'
        ];

        $validate = Validator::make($request->all(),$camposValidacion,$messages);

        //dd($validate);

        if($validate->fails()){
            return back()->withErrors($validate->errors())->withInput();
        }

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'id_municipalidad' => $municipalidad,            
        ]);

        return back()->with('success', 'Usuario creado con éxito.');
    }
}
