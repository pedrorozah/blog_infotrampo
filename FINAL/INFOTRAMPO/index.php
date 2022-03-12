<?php
    require __DIR__.'/vendor/autoload.php';
    use \App\Entity\Usuario;
    use \App\Sessao\LogSessao;

    $users = Usuario::getUsers();

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/home.php';
    include __DIR__.'/includes/footer.php';
?>