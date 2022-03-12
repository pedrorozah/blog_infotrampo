<?php
    require __DIR__.'/vendor/autoload.php';
    use \App\Entity\Usuario;
    use \App\Sessao\LogSessao;

    //Força o usuario a estar Deslogado para poder se Logar
    LogSessao::requireLogOut();

    //Define o titulo da página
    define('TITLE','Login');
    
    //Confere se as informações de Login foram preenchidas
    if(isset($_POST['email'],$_POST['senha'])){

        //Pega as informações do usuario que possui esse email
        $user = Usuario::getLogin($_POST['email']);
 
        //Confere se esse usuario existe E se ele existir confere se o email e a senha estão de acordo com as informações
        if (!$user instanceof Usuario || !password_verify($_POST['senha'],$user->senha)) {
            
            //Redireciona o usuario de volta para a página de Login informando que a algum erro nas informações que ele passou
            header('location: logar.php?status=error4');
            exit;
        }

        //Após conferir que tudo esta de acordo, chama a função que loga o Usuario
        LogSessao::login($user);

    }

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/formularioDeLogin.php';
    include __DIR__.'/includes/footer.php';
