<?php
    require __DIR__ . '/vendor/autoload.php';

    /* Dependências */
    use \App\Entity\Publicacao;
    use App\Sessao\LogSessao;

    //Força o usuario a estar logado para acessar esta página
    LogSessao::requireLog();

    //Chama todas a publicações cadastradas 
    $publicacoes = Publicacao::getPublicacoes();

    //Chama as páginas que fazem parte da Aba Publicações
    include __DIR__ . '/includes/header.php';
    include __DIR__ . '/includes/listaPublicacoes.php';
    include __DIR__ . '/includes/footer.php';
?>
