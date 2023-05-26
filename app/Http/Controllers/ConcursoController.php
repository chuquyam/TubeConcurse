<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Concursos;

class ConcursoController extends Controller
{
    private $objConcursos;


    public function __construct(){

        $this->objConcursos = new Concursos();

    }

    public function index(){


        $concursos=$this->objConcursos->all();
        return view('concurso/listarconcurso',compact('concursos'));


    }

    public function create()
    {
        return view('concurso/concurso');
    }



    public function store(Request $request){

        $objConcursos = new Concursos;
        $objConcursos -> codconcurso = $request->input('codconcurso');
        $objConcursos -> nomedoconcurso = $request->input('nomedoconcurso');
        $objConcursos -> numerodoedital = $request->input('numerodoedital');

        $objConcursos -> numerodoedital = $request->input('numerodoedital');
        $objConcursos -> nomedoinstituto = $request->input('nomedoinstituto');
        $objConcursos -> nomedocargo = $request->input('nomedocargo');
        $objConcursos -> nomedaorganizadora = $request->input('nomedaorganizadora');
        $objConcursos -> datadaprova = $request->input('datadaprova');
        $objConcursos -> datadeinicio = $request->input('datadeinicio');
        $objConcursos -> datafinal = $request->input('datafinal');
        $objConcursos -> nomeinterno = $request -> input('nomeinterno');

        $objConcursos->save();
        return redirect() ->back()->with('status','concurso cadastrado com sucesso');

    }

    public function edit($id){
        $objConcursos = Concursos::find($id);
        return view('editar', compact('concursos'));
    }

    public function update(Request $request){


        $objConcursos = Concursos::find($id);
        $objConcursos -> codconcurso = $request->input('codconcurso');
        $objConcursos -> nomedoconcurso = $request->input('nomedoconcurso');
        $objConcursos -> numerodoedital = $request->input('numerodoedital');

        $objConcursos -> numerodoedital = $request->input('numerodoedital');
        $objConcursos -> nomedoinstituto = $request->input('nomedoinstituto');
        $objConcursos-> nomedocargo = $request->input('nomedocargo');
        $objConcursos -> nomedaorganizadora = $request->input('nomedaorganizadora');
        $objConcursos -> datadaprova = $request->input('datadaprova');
        $objConcursos-> datadeinicio = $request->input('datadeinicio');
        $objConcursos-> datafinal = $request->input('datafinal');
        $objConcursos -> nomeinterno = $request -> input('nomeinterno');



        $objConcursos->save();
        return redirect() ->back()->with('status','concurso atualizado com sucesso');

    }

    public function show($id){

    $concursos = $this->objConcursos->find($id);
     return view ('show',compact('concursos'));
    }


}
