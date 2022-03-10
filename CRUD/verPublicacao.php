<?php
require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Publicacao;
use App\Sessao\LogSessao;

//Exige que a pessoa esteja logada para acessar essaa página
LogSessao::requireLog();

//Define o titulo da página
define('TITLE', 'Postagem');

//Confere se o ID passado na hora de chamar essa página é um ID existente e se ele é numérico
if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: index.php?status=error1');
    exit;
}

//Pega os dados da publicação com base no ID que foi passado
$publicacao = Publicacao::getPublicacao($_GET['id']);

//Confere se existem uma publicação com aquele ID dentro do banco de dados
if (!$publicacao instanceof Publicacao) {
    header('location: index.php?status=error2');
    exit;
}

//Confere se quem está tentando editar a postagem é o autor da postagem ou um administador
//LogSessao:: requireValidation($publicacao->id_autor);
$userLog = LogSessao::getUserLog();
$userP=$userLog;
$result='';
if ($userP['tipo_user']=='administrador'||$userP['id']==$publicacao->id_autor) {
    $result .=
    '<a href="editarPublicacao.php?id=' . $publicacao->id_publicacao . '">
        <button type="button" class="btn btn-primary">Editar</button>
    </a>
    <a href="excluirPublicacao.php?id=' . $publicacao->id_publicacao . '">
        <button type="button" class="btn btn-danger">Excluir</button>
    </a>'
;
}

//Confere se os dados a serem editados estão preenchidos antes de atualizalos
if(isset($_POST['denunciar'])){
    echo"seu pai é otario";
    print_r($publicacao->id_publicacao);
    $redirect='location:cadastrarDenunciar.php?id='.($publicacao->id_publicacao);
    header($redirect);
    exit;
};    

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/postPublicacao.php';
include __DIR__ . '/includes/footer.php';
