<?php

namespace App\Http\Controllers;

use App\Models\Cargos;
use Illuminate\Http\Request;

class CargosController extends Controller
{
    public function __construct(){

        $this->objCargos = new Cargos();

    }

    public function index(){


        $cargos=$this->objCargos->all();
        return view('cargos/listarcargos',compact('cargos'));


    }

    public function create()
    {
        return view('cargos/cargo');
    }

    public function store(Request $request){

        $objCargos = new Cargos;
        $objCargos -> nomedocargo = $request->input('nomedocargo');
        $objCargos -> id_nomedoconcurso = $request->input('id_nomedoconcurso');

        $objCargos->save();
        return redirect() ->back()->with('status','cargo cadastrado com sucesso');

    }
}
