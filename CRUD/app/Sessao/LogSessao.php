<?php
namespace App\Sessao;

class loginSessao{
    public static function isLogged(){
        return false;
    }
//chamar essa função nas paginas onde o usuario precisa estar logado pra acessar
// loginSessao::requireLog();
    public static function requireLog(){
        if (!self::isLogged()) {
          header('location:cadastrar.php');
          exit;
        }
    }
//chamar essa função nas paginas onde o usuario precisa NÃO estar logado pra acessar
// loginSessao::requireLogOut();
    public static function requireLogOut(){
        if (self::isLogged()) {
          header('location:index.php');
          exit;
        }
    }
}

?>