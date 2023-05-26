<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class SliderController extends Controller
{


    public function index(){
        $slider = Slider::all();
        return view('slider/slider', compact('slider'));
    }

    public function create(){
        return view('slider/criarslider');
    }

    public function store(Request $request){

        $slider = new Slider;
        $slider -> nome = $request->input('nome');
        $slider -> descricao = $request->input('descricao');
        $slider -> link = $request->input('link');
        $slider -> link_nome = $request->input('link_nome');
        if($request -> hasfile('imagem')){
            $file = $request -> file('imagem');
            $extention = $file -> getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file -> move('uploads/slider/', $filename);
            $slider->imagem = $filename;
        }
        $slider->status = $request -> input('status') == true ? '1':'0';
        $slider->save();
        return redirect() ->back()->with('status','Slider cadastrado com sucesso');

    }

    public function edit($id){
        $slider = Slider::find($id);
        return view('slider/editar', compact('slider'));
    }

    public function update(Request $request, $id){

        $slider = Slider::find($id);
        $slider -> nome = $request->input('nome');
        $slider -> descricao = $request->input('descricao');
        $slider -> link = $request->input('link');
        $slider -> link_nome = $request->input('link_nome');
        if($request -> hasfile('imagem')){

             $destination = 'uploads/slider/'.$slider->imagem;

            if(File::exists($destination)){
                File::delete($destination);
            }

            $file = $request -> file('imagem');
            $extention = $file -> getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file -> move('uploads/slider/', $filename);
            $slider->imagem = $filename;
        }
        $slider->status = $request -> input('status') == true ? '1':'0';
        $slider->save();
        return redirect() ->back()->with('status','Slider atualizado com sucesso');


    }




}

