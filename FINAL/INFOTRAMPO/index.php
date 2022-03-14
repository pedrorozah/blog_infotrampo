<?php
    require __DIR__.'/vendor/autoload.php';
   
   /* Dependências */
    use \App\Entity\Usuario;
    use \App\Sessao\LogSessao;

    //$users = Usuario::getUsers();

    //Chama as paginas que fazem parte da Página Inicial
    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/home.php';
    include __DIR__.'/includes/footer.php';
?>