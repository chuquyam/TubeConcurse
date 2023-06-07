@extends('layouts.app')


<style>
.container1{
   background: #fff;
   position: flex;
   box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.212);
}
</style>

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


<div class="container1">
                    <div class="title" style="text-align: center">
                        <h1>Lista de Matriculados</h1>
                        <input class="botao1" type="button" value="Voltar" onClick="history.go(-1)">
                    </div>

                    <div class="text-center mt-3 mb-4">
                    <a href="{{url("add-matricula")}}" >
                        <Button class="btn btn-success">Cadastrar</button>
                    </a>
                    </div>
<div class="table-responsive">
    <div class="col-12 m-auto">
           <table class="table table-striped table-bordered text-center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome do concurso</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Idade</th>
                    <th scope="col">Telefone</th>


                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

           @foreach($matricula as $matricula)
            <tr>
                    <th scope="row">{{$matricula->id}}</th>
                    <td>{{$matricula->id_nomedoconcurso}}</td>
                    <td>{{$matricula->email }}</td>
                    <td>{{$matricula->preco}}</td>
                    <td>{{$matricula->idade}}</td>
                    <td>{{$matricula->telefone}}</td>
                    <td>
                          <a href="">
                          <button class="btn btn-dark">Ver</button>
                          </a>
                          <a href="">
                          <button class="btn btn-primary">Edit</button>
                        </a>
                        <a href="">
                          <button class="btn btn-danger">Del</button>
                        </a>
                    </td>
            </tr>
           @endforeach

        </tbody>
    </table>

</div>
@endcan
@endsection
