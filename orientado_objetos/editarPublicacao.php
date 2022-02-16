<?php

// TEM QUE FAZER O EDITAR
require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Publicacao;

define('TITLE', 'Editar Publicação');

if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: index.php?status=error1');
    exit;
}

$publicacao = Publicacao::getPublicacao($_GET['id']);


if (!$publicacao instanceof Publicacao) {
    header('location: index.php?status=error2');
    exit;
}

if (isset($_POST['tipoPublicacao'], $_POST['titulo'], $_POST['descricao'], $_POST['estado'], $_POST['cidade'])) {
    $publicacao->tipo_publicacao = $_POST['tipoPublicacao'];
    $publicacao->titulo = $_POST['titulo'];
    $publicacao->descricao = $_POST['descricao'];
    $publicacao->estado = $_POST['estado'];
    $publicacao->cidade = $_POST['cidade'];
    $publicacao->atualizar();
    header('location:index_publicacao.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioEditarPublicacao.php';
include __DIR__ . '/includes/footer.php';
