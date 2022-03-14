<?php
require __DIR__ . '/vendor/autoload.php';

/* Dependências */

use \App\Entity\Publicacao;
use App\Sessao\LogSessao;

//Força o usuario a estar logaddo para acessar essa pagina
LogSessao::requireLog();

//Define o titulo da página
define('TITLE', 'Confirmar Exclusão');

//Confere se o ID da publicação passada existe e se ele é numerico
if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: index_publicacao.php?status=error');
    exit;
}

//Preenche as informações da publicação com base no ID passado ao acessar a página
$publicacao = Publicacao::getPublicacao($_GET['id']);

//Confere se a registro dessa publicação no banco de dados
if (!$publicacao instanceof Publicacao) {
    header('location: index_publicacao.php?status=error');
    exit;
}

//Confere se a pessoa Confirmou que deseja excluir a postagem 
if (isset($_POST['excluir'])) {

    //Manda a excluir a Postagem e retorna o usuario para a aba publicações
    $publicacao->excluir();
    header('location:publicacoes.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/confirmarExcluirPublicacao.php';
include __DIR__ . '/includes/footer.php';
