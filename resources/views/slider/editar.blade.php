@extends('layouts.app')

@section('title','TubeConcurso')

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    @can('aluno')
    Dados do Aluno
    @elsecan('admin')
     <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                   <div class="card-header">{{ __('Criar Sliders') }}
                   </div>

                    <div class="container mt-12">
                        <div class="row">
                        @if (session('status'))
                            <h5 class="alert alert-success">{{ session('status')}}</h5>



                        @endif
                            <div class="card-body">
                                <div class="col-md-12">
                                    <h4><a href="{{ url ('home-slider')}}" class="btn btn-danger float-right" >Voltar</a></h4>
                                </div>

                                <form action="{{ url('update-slider/'.$slider -> id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                    <div class="form-group">
                                        <label for="">Nome</label>
                                        <input type="text" name="nome" value="{{ $slider->nome }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Descrição</label>
                                        <textarea name="descricao" class="form-control" value="{{ $slider->descricao }}"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Link</label>
                                        <input type="text" name="link" class="form-control" value="{{ $slider->link }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nome do link</label>
                                        <input type="text" name="link_nome" class="form-control" value="{{ $slider->link_nome }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Imagem para Upload</label>
                                        <input type="file" name="imagem" class="form-control">
                                            <img src="{{ asset('uploads/slider/'.$slider->image)}}" width="100" alt="slide">
                                    </div>
                                    <div class="form-group">
                                        <label for = ""> Status</label>
                                        <br>
                                        <input type = "checkbox" name = "status" {{ $slider->status == '1' ? 'checked':'' }} > 0=Visível, 1=Escondido
                                    </div>
                                    <div >
                                        <button type="submit" class="bt btn-primary">Enviar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endcan

@endsection
