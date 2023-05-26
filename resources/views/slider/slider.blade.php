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
                        <div class="card-header">{{ __('Inserir Sliders') }}
                    </div>
                        <div class="card-body">
                            <div class="container mt-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-reader">
                                            <h4><a href="{{ url ('add-slider')}}" class="btn btn-primary float-right">Inserir  Slider</a></h4>
                                        </div>
                                            <div class="card-body">
                                                {{-- Seu Slide --}}
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Nome</th>
                                                            <th>Imagem</th>
                                                            <th>Status</th>
                                                            <th>Editar</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($slider as $item)
                                                            <tr>
                                                                <td>{{ $item -> id }}</td>
                                                                <td>{{ $item -> nome }}</td>
                                                                <td>
                                                                <img src="{{ asset('uploads/slider/'.$item->imagem) }}" width="100" alt="imagem de slider" />
                                                                </td>
                                                                <td>
                                                                    @if($item -> status == '1')
                                                                        Escondido
                                                                    @else
                                                                        Visível
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <a href="{{ url('edit-slider/'.$item->id) }}" class="btn btn-success btn-sm">Editar</a>
                                                                </td>

                                                            </tr>
                                                        @endforeach

                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endcan

@endsection

