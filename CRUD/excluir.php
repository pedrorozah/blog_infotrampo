<?php
    require __DIR__.'/vendor/autoload.php';
    use \App\Entity\Usuario;
    use \App\Entity\listaCadastros;    
    use App\Sessao\LogSessao;
    
    //Força o usuario a estar logada para poder acessar essa páginaa
    LogSessao::requireLog();

    //Define o titulo dessa página
    define('TITLE','Exclusão');

    //Confere se o ID passado na hora de chamar está pagina existe e se ele é numerico
    if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
        header('location: index.php?status=error');
        exit;
    }

    //Preenche a variavel de Usuario com os dados do usuario correpondente ao ID passado
    $user = new Usuario;
    $user = Usuario::getUser($_GET['id']);

    //Confere se a pessoa que está tentando excluir é a Dona do Perfil ou Administador
    LogSessao:: requireValidation($_GET['id']);

    //Confere se a registro desse usuario no banco de dados, caso não haja retorna o usuario e informa que houve um erro
    if (!$user instanceof Usuario) {
      header('location: index.php?status=error');
      exit;
    }

    //Confere se a pessoa Confirmou que deseja excluir a conta
    if(isset($_POST['excluir'])){

        //Chama a função que exclui o usuario e o redireciona para a pagina inicial
        $user->excluir();
        header('location:index.php?status=success');
        exit;
    }

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/confirmarExcluir.php';
    include __DIR__.'/includes/footer.php';
