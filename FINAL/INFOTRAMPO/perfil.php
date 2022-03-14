<?php
    require __DIR__.'/vendor/autoload.php';
    use \App\Entity\Usuario;
    use \App\Sessao\LogSessao;

    //Força o usuario a estar Deslogado para poder se Logar
    LogSessao::requireLog();

    //Define o titulo da página
    define('TITLE','Perfil');

    $userLog = LogSessao::getUserLog();

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/perfilView.php';
    include __DIR__.'/includes/footer.php';
