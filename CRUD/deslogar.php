<?php 
 require __DIR__.'/vendor/autoload.php';
 use \App\Sessao\LogSessao;
 
 //Define que a pessoa primeiro precisa estar logada para poder Deslogar
 LogSessao::requireLog();

 //Chama a função que vai deslogar o usuario
 LogSessao::logOut();

?>