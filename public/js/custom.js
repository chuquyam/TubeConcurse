const situacao = document.getElementById*("id_codconcurso");
if(situacao){
    listarSituacao();
}

async function listarSituacao(){

    await fetch('listar_situacao.php');
}
