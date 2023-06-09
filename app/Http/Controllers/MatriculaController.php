<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{

    private $objMatricula;

    public function __construct(){

        $this->objMatricula = new Matricula();

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matricula=$this->objMatricula->all();
        return view('matricula/listarmatricula',compact('matricula'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('matricula/matricula');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $objMatricula = new Matricula;
        $objMatricula -> id_nomedoconcurso = $request->input('id_nomedoconcurso');
        $objMatricula -> email = $request->input('email');
        $objMatricula-> preco = $request->input('preco');
        $objMatricula -> idade = $request->input('idade');
        $objMatricula -> telefone = $request->input('telefone');


        $objMatricula->save();
        return redirect() ->back()->with('status','matriculado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
