<?php
require __DIR__ . '/vendor/autoload.php';

/* Dependências */

use \App\Entity\Publicacao;

$publicacoes = Publicacao::getPublicacoes();

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/listaPublicacoes.php';
include __DIR__ . '/includes/footer.php';
