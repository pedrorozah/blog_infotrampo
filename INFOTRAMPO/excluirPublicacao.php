<?php

// TEM QUE FAZER EXCLUIR
require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Publicacao;

define('TITLE', 'Confirmar Exclusão');


if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: index_publicacao.php?status=error');
    exit;
}

$publicacao = Publicacao::getPublicacao($_GET['id']);
//

if (!$publicacao instanceof Publicacao) {
    header('location: index_publicacao.php?status=error');
    exit;
}
//echo "<pre>";print_r($publicacao); echo"</pre>";
if (isset($_POST['excluir'])) {
    $publicacao->excluir();
    header('location:index_publicacao.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/confirmarExcluirPublicacao.php';
include __DIR__ . '/includes/footer.php';
