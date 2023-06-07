@extends('layouts.app')

@section('title','TubeConcurso')


<style>

.container1{
   background: #fff;
   position: flex;
   box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.212);
}

fieldset {
    border: 0;
    margin: 2em;
}

.fieldsetBotao{
    display: flex;
    align-items: center;
    justify-content: center;
}

 input,  button {
    font-family: sans-serif;
    font-size: 1em;
    margin-left: 0.5em;
}

.grupo:before, .grupo:after {
    content: " ";
    display: table;
}

.grupo:after {
    clear: both;
}

.campo {
    margin-bottom: 1em;
    margin-left: 1em;
}

.campo label {
    margin-bottom: 0.5em;

    color: #666;
    display: block;
}

fieldset.grupo .campo {
    float:  left;
    margin-right: 1em;
}

.campo input[type="text"],
 {
    padding: 0.2em;
    border: 1px solid #CCC;
    box-shadow: 2px 2px 2px rgba(0,0,0,0.2);
    display: block;
}

.campo input:focus  {
    background: #FFC;
}

.campo  {
    color: #000;
    display: inline-block;
    margin-right: 1em;
}

.botao1{
    width: 150px;
    background: #ddfcc5;
    padding: 15px 20px;
    border: 1px solid #eee;
    border-radius: 26px;
    font-size: 14px;
}

.botao1:hover {
    background: #5b9ac1;
    box-shadow: inset 2px 2px 2px rgba(0,0,0,0.2);
    text-shadow: none;
}

</style>

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

<form class="formulario" action="{{ url('store-cargo')}}" method="POST">
@csrf


                    <div class="title" style="text-align: center">
                        <h1>Cadastro de Cargos</h1>
                    </div>

                    <div class="fieldsetbotao">
                        <img classe="img-responsive" src="../../../build/assets/imagens/logotube.png" alt="TubeConcuso Logo" >
                    </div>

    <fieldset>
        <fieldset class="grupo">
            <div class="campo">
                <label for="nomedocargo">Nome do Cargo</label>
                <input type="text" id="nomedocargo" name="nomedocargo" style="width: 20em" required >
            </div>

    <!--select vem da tabela sliders-->
             <div class="campo">
                    <label for="id_nomedoconcurso">Selecione o concurso</label>
                    <select name="id_nomedoconcurso" id="id_nomedoconcurso">
                        <?php

                            $host= "mysql";
                            $user= "root";
                            $pass = "root";
                            $dbname = "tubeconcurso";
                            $port = 3306;

                        try{

                            $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);
                            } catch(PDOEXception $err){
                                echo "Erro de conexão".$err->getMessage();
                            }
                        ?>
                        <?php
                            $query = $conn->query("SELECT id, nome FROM sliders order by nome asc");
                            $registros = $query->fetchAll(PDO::FETCH_ASSOC);

                            foreach($registros as $option){
                        ?>
                            <option value="<?php echo $option['id'] ?>"><?php echo $option['nome'] ?></option>
                        <?php
                        }
                        ?>
                    </select>

            </div>


        </fieldset>

        <fieldset class="group">
        <fieldset class="fieldsetBotao">

            <div class="campo" >
                <input class="botao1" type="button" value="Voltar" onClick="history.go(-1)">
                <button class="botao1" type="reset">Limpar</button>
                <button class="botao1" type="submit">Cadastrar</button>
            </div>

        </fieldset>
        </fieldset>
        </fieldset>

</form>


@endcan
@endsection
