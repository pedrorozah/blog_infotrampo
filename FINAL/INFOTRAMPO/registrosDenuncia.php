<?php
    require __DIR__ . '/vendor/autoload.php';

    /* Dependências */
    use \App\Entity\Denuncia;
    use App\Sessao\LogSessao;

    //Força o usuario a estar logado para acessar esta página
    LogSessao::requireLog();
    
    //Exige que o usuario seja administrador para acessar esta página
    LogSessao::requirePermision();

    //Chama todas as denuncias cadastradas 
    $denuncias = Denuncia::getDenuncias();

    //Chama as páginas que fazem parte da Aba Registro de Denuncias
    include __DIR__ . '/includes/header.php';
    include __DIR__ . '/includes/listaDenuncias.php';
    include __DIR__ . '/includes/footer.php';
?>
