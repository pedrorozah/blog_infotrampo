<?php
    require __DIR__.'/vendor/autoload.php';
    use \App\Entity\usuario;
    define('TITLE','Login');
    /*
    if (!isset($_GET['email']) or !isset($_GET['senha'])) {
        header('location: index.php?status=error3');
        exit;
    }
    */if(isset($_POST['email'],$_POST['senha'])){
        $user = new usuario;
        $info = $user->getLogin($_POST['email'],$_POST['senha']);
        //print_r('funcioonou :D');
        print_r($info);
        //header('location:perfil.php?status=success');
        //exit;
        if (!$user instanceof usuario) {
            header('location: index.php?status=error4');
            exit;
        }
    }
    
    
    
    //header('location:index.php?status=success');
    //exit;

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/formularioLogin.php';
    include __DIR__.'/includes/footer.php';
