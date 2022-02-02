<?php
    require __DIR__.'/vendor/autoload.php';
    use \App\Entity\Usuario;

    $users = Usuario::getUsers();

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/listaCadastros.php';
    include __DIR__.'/includes/footer.php';
