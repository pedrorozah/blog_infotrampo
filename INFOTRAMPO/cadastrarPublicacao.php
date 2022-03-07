<?php
require __DIR__ . '/vendor/autoload.php';

/* Dependências */

use \App\Entity\publicacao;

define('TITLE', 'Cadastrar Publicação');

if (isset($_POST['tipoPublicacao'], $_POST['titulo'], $_POST['descricao'], $_POST['estado'], $_POST['cidade'])) {

    if ($_POST['estado'] == 'default' || $_POST['cidade'] == 'default') {
        header('location:index_publicacao.php?status=erro');
        exit;
    }

    $publicacao = new publicacao;
    $publicacao->tipo_publicacao = $_POST['tipoPublicacao'];
    $publicacao->titulo = $_POST['titulo'];
    $publicacao->descricao = $_POST['descricao'];
    $publicacao->estado = $_POST['estado'];
    $publicacao->cidade = $_POST['cidade'];
    $publicacao->cadastrar();

    header('location:index_publicacao.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioPublicacaoCadastro.php';
include __DIR__ . '/includes/footer.php';
