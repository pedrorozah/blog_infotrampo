<?php
require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Publicacao;
use App\Sessao\LogSessao;

//Exige que a pessoa esteja logada para acessar essaa página
LogSessao::requireLog();

//Define o titulo da página
define('TITLE', 'Editar Publicação');


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
LogSessao:: requireValidation($publicacao->id_autor);

//Confere se os dados a serem editados estão preenchidos antes de atualizalos
if (isset($_POST['tipoPublicacao'], $_POST['titulo'], $_POST['descricao'], $_POST['estado'], $_POST['cidade'])) {
    
    //Preenche a variavel publicação com os novos dados ante de chamar a função que vai alualizala
    $publicacao->tipo_publicacao = $_POST['tipoPublicacao'];
    $publicacao->titulo = $_POST['titulo'];
    $publicacao->descricao = $_POST['descricao'];
    $publicacao->estado = $_POST['estado'];
    $publicacao->cidade = $_POST['cidade'];

    //Manda atualizar os dados da publicação e redireciona a usuario de volta para a aba de publicações
    $publicacao->atualizar();
    header('location:publicacoes.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioEditarPublicacao.php';
include __DIR__ . '/includes/footer.php';
