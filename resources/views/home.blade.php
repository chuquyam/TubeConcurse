@extends('layouts.app')

@section('content')


<?php
        //criando uma conexão manual para testar slide
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



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @can('aluno')


                    <?php
                        //Query para recuperar os slides do banco de dados
                        $query_sliders = "SELECT * FROM sliders WHERE status = 0";
                        //Preparar a query
                        $resultado = $conn->prepare($query_sliders);
                        //Executar a query
                        $resultado->execute();
                        //contar a quantidade de registro recuperado do BD
                        $quantidade_slides = $resultado->rowCount();
                    ?>
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <?php
                                    //criar laço de repetição
                                    $controle = 0;
                                    while($controle < $quantidade_slides){
                                        $ativo = "";
                                        if($controle == 0){
                                            $ativo = "active";

                                        }
                                        echo "<button type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide-to='$controle' class='$ativo' aria-current='true' aria-label='Slide 1'></button>";
                                    $controle++;
                                    }
                                ?>
                            </div>
                            <!--fim dos indicadores-->

                            <div class="carousel-inner">
                            <!--Inidio das imagens tiradas do BD-->
                            <?php
                                $controle = 0;
                                while($row_slide = $resultado->fetch(PDO::FETCH_ASSOC)){
                                    //var_dump($row_slide);
                                    extract($row_slide);
                                    $ativo = "";
                                    if($controle == 0){
                                        $ativo = 'active';
                                    }
                                        echo "<div class='carousel-item $ativo'>";
                                        echo "<img src='uploads/slider/$imagem' class='d-block w-100' alt='imagem'>";
                                        echo "</div>";
                                        $controle++;
                                }

                            ?>

                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>

                    @elsecan('admin')
                            <div class="card">
                                <div class="card-header">{{ __('Área do Administrador') }}
                                    </div>

                                @include('menu-lateral')

                            </div>

                    @endcan


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
