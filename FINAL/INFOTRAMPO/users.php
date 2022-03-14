<?php
    require __DIR__.'/vendor/autoload.php';
   
   /* Dependências */
    use \App\Entity\Usuario;
    use \App\Sessao\LogSessao;

    //Preenche a variavel com todos os usuarios registrados no banco de dados 
    $users = Usuario::getUsers();
    
    //obriga o usuario a estar logado para poder acessar essa página
    LogSessao::requireLog();

    //obriga o usuario a ser um administrador para acessar essa página 
    LogSessao::requirePermision();

    //Chama as paginas que fazem parte dessa página
    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/listaCadastros.php';
    include __DIR__.'/includes/footer.php';
?>