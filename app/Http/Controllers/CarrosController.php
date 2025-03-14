<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use Illuminate\Http\Request;

class CarrosController extends Controller
{

    //MUESTRA LA LISTA DE LOS CARROS
    public function index()
    {
        return view('carros.index');
    }

    //MUESTRA EL FORMULARIO PARA CREAR UN NUEVO CARRO
    public function crear()
    {
        return view('carros.crear');
    }


    //MUESTRA EL FORMULARIO PARA EDITAR UN CARRO
    public function editar(int $id)
    {
        $carro = Carro::find($id);

        if(!$carro)
        {
            abort(404, "No se pudo encontrar el carro");
            return;
        }

        $carro->load(['modelo.marca', 'color']);

        return view('carros.editar', ['carro' => $carro]);
    }
}
