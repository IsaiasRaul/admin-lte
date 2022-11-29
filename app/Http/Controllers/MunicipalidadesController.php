<?php

namespace App\Http\Controllers;

use App\Models\Municipalidades;
use Illuminate\Http\Request;

class MunicipalidadesController extends Controller
{
    public function index()
    {
        $munis = Municipalidades::paginate();

        return view('municipio.municipalidades', compact('munis'));
    }
}
