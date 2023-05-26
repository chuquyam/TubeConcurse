<?php

namespace App\Http\Controllers;

use App\Models\Disciplinas;
use Illuminate\Http\Request;

class DisciplinaController extends Controller

{
    private $objDisciplina;

    public function __construct(){

        $this->objDisciplina = new Disciplinas();

    }



    public function index(){


        $disciplina=$this->objDisciplina->all();
        return view('disciplinas/listardisciplinas',compact('disciplina'));


    }

    public function create()
    {
        return view('disciplinas/disciplinas');
    }

    public function store(Request $request){

        $objDisciplina = new Disciplinas;
        $objDisciplina -> coddisciplina = $request->input('coddisciplina');
        $objDisciplina-> nomedadisciplina = $request->input('nomedadisciplina');
        $objDisciplina -> descricao = $request->input('descricao');

        $objDisciplina -> tipo = $request->input('tipo');
        $objDisciplina -> link = $request->input('link');
        $objDisciplina -> id_codconcurso = $request->input('id_codconcurso');

        $objDisciplina->save();
        return redirect() ->back()->with('status','disciplina cadastrada com sucesso');

    }
}
