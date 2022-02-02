<?php
    require __DIR__.'/vendor/autoload.php';
    use \App\Entity\usuario;


    if(isset($_POST['tipoUsuario'],$_POST['nome'],$_POST['cpf'],$_POST['senha'],$_POST['email'],$_POST['decricao'],$_POST['dataN'])){
        $user = new usuario;
        $user->tipo_user = $_POST['tipoUsuario'];
        $user->nome = $_POST['nome'];
        $user->cpf = $_POST['cpf'];
        $user->senha = $_POST['senha'];
        $user->email = $_POST['email'];
        $user->decricao = $_POST['decricao'];
        $user->data_nascimento = $_POST['dataN'];
        $user->cadastrar();
    }
    print_r($user);
    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/formulario.php';
    include __DIR__.'/includes/footer.php';
