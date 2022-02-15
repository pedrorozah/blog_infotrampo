<?php
    require __DIR__.'/vendor/autoload.php';
    use \App\Entity\usuario;
    define('TITLE','Cadastrar Usuario');

    if(isset($_POST['tipoUsuario'],$_POST['nome'],$_POST['cpf'],$_POST['senha'],$_POST['email'],$_POST['descricao'],$_POST['dataN'])){
        $user = new usuario;
        $user->tipo_user = $_POST['tipoUsuario'];
        $user->nome = $_POST['nome'];
        $user->cpf = $_POST['cpf'];
        $user->senha = $_POST['senha'];
        $user->email = $_POST['email'];
        $user->descricao = $_POST['descricao'];
        $user->data_nascimento = $_POST['dataN'];
        $user->cadastrar();

        header('location:index.php?status=success');
        exit;
    }

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/formularioCadastro.php';
    include __DIR__.'/includes/footer.php';
