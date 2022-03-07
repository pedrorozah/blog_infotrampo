<?php
    require __DIR__.'/vendor/autoload.php';
    use \App\Entity\Usuario;
    use \App\Sessao\LogSessao;

    LogSessao::requireLog();
    $users = Usuario::getUsers();

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/listaCadastros.php';
    include __DIR__.'/includes/footer.php';
