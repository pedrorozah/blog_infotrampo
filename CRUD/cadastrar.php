<?php
    require __DIR__.'/vendor/autoload.php';
    use \App\Entity\usuario;
use App\Sessao\LogSessao;

    define('TITLE','Cadastrar Usuario');
    $alerta='';
    if(isset($_POST['tipoUsuario'],$_POST['nome'],$_POST['cpf'],$_POST['senha'],$_POST['email'],$_POST['descricao'],$_POST['dataN'])){
        $user = new usuario;
        
        $userV = usuario::getLogin($_POST['email']);
        if ($userV instanceof usuario) {
            $alerta= 'O email digitado ja esta em uso';
        }else{
        
        $user->tipo_user = $_POST['tipoUsuario'];
        $user->nome = $_POST['nome'];
        $user->cpf = $_POST['cpf'];
        $user->senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        $user->email = $_POST['email'];
        $user->descricao = $_POST['descricao'];
        $user->data_nascimento = $_POST['dataN'];
        $user->cadastrar();
       LogSessao::login($user);
        header('location:index.php?status=success');
        exit;
      };
    }

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/formularioCadastro.php';
    include __DIR__.'/includes/footer.php';
