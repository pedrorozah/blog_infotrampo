<?php
namespace App\Sessao;

class LogSessao{

    private static function init(){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }
    
    public static function login($user){
        self::init();
        $_SESSION['usuario'] = [
            'id' => $user->id,
            'tipo_user' => $user->tipo_user,
            'nome' => $user->nome,
            'cpf' => $user->cpf,
            'email' => $user->email,
            'descricao' => $user->descricao,
            'data_nascimento' => $user->data_nascimento
        ];
        header('location:index.php?status=bemvindo');
    }

    public static function getUserLog(){
        self::init();
        return self::isLogged() ? $_SESSION['usuario'] : null;
        
    }

    public static function isLogged(){
        self::init();
        return isset($_SESSION['usuario']['id']);
    }

    public static function logOut(){
        self::init();
        unset($_SESSION['usuario']);
        header('location:logar.php');
        exit;
        
    }

//chamar essa função nas paginas onde o usuario precisa estar logado pra acessar
// LogSessao::requireLog();
    public static function requireLog(){
        if (!self::isLogged()) {
          header('location:cadastrar.php');
          exit;
        }
    }
//chamar essa função nas paginas onde o usuario precisa NÃO estar logado pra acessar
//  LogSessao::requireLogOut();
    public static function requireLogOut(){
        if (self::isLogged()) {
          header('location:index.php');
          exit;
        }
    }
}

?>