<?php
    require __DIR__.'/vendor/autoload.php';
    use \App\Entity\usuario;
    use \App\Sessao\LogSessao;

    define('TITLE','Login');
    LogSessao::requireLogOut();
    /*
    if (!isset($_GET['email']) or !isset($_GET['senha'])) {
        header('location: index.php?status=error3');
        exit;
    }
    */
    if(isset($_POST['email'],$_POST['senha'])){
        //echo("testeee");
        $user = usuario::getLogin($_POST['email']);
        //$user = $user->getLogin($_POST['email']);   
        //print_r($user);
        /*
        $info = $user->getLogin($_POST['email'],$_POST['senha']);
        //print_r('funcioonou :D');
        print_r($info);
        //header('location:perfil.php?status=success');
        //exit;*/
        if (!$user->getLogin($_POST['email']) instanceof usuario || !password_verify($_POST['senha'],$user->senha)) {
            header('location: logar.php?status=error4');
            exit;
        }

        LogSessao::login($user);

    }
    
    
    
    //header('location:index.php?status=success');
    //exit;

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/formularioLogin.php';
    include __DIR__.'/includes/footer.php';
