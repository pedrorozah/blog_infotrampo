<?php
namespace App\Sessao;

class LogSessao{

    //Função que quando chamada inicia uma Sessão
    private static function init(){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }
    
    //Função que prenche a Sessão com os dados de que Logou
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

    //Função que pega o usuario que está logado
    public static function getUserLog(){
        self::init();
        return self::isLogged() ? $_SESSION['usuario'] : null;
        
    }
    //Função que confere se o Usuario esta logado e retorna as informações
    public static function isLogged(){
        self::init();
        return isset($_SESSION['usuario']['id']);
    }

    //Função que encerra a sessão e desloga o usuario
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
//chamar essa função onde o usuario precisa ser ADM pra acessar
//  LogSessao::requirePermision();
public static function requirePermision(){
    if ($_SESSION['usuario']['tipo_user']!=='administrador') {
      header('location:index.php');
      exit;
    }
}
//chamar essa função onde o usuario precisa ser ADM ou Ser o Dono da postagem pra acessar
//  LogSessao:: requireValidation();
public static function requireValidation($id){
    if ($_SESSION['usuario']['id']!==$id&&$_SESSION['usuario']['tipo_user']!=='administrador') {
      header('location:index.php');
      exit;
    }
}


}

?>