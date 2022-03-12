<?php
    require __DIR__.'/vendor/autoload.php';
    use App\Entity\Usuario;  
    use App\Sessao\LogSessao;
    
    //Força a pessoa a estar logada para poder acessar essa página
    LogSessao::requireLog();
    
    //Define o titulo da página
    define('TITLE','Editar Perfil');


    //Confere se a informação de ID passada Existe e se ela é um valor numerico, caso não seja retorna a pagina anterior avisando que houve um erro
    if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
        header('location: index.php?status=error1');
        exit;
    }

    //Confere se a pessoa que está tentando editar é a Dona do Perfil ou Administador
    LogSessao:: requireValidation($_GET['id']);

    //Pega as informações do ussuario com base no ID passado ao chamar essa página
    $user   = Usuario::getUser($_GET['id']);

    //Confere se o ID passado é de um Usuario que existe, caso não seja retorna a pagina anterior que houve um erro
    if (!$user instanceof Usuario) {
      header('location: index.php?status=error2');
      exit;
    }
   
    //Conferme se as informações a serem atualizadas existem antes de chamar a função que atualiza
    if(isset($_POST['tipoUsuario'],$_POST['nome'],$_POST['cpf'],$_POST['senha'],$_POST['email'],$_POST['descricao'],$_POST['dataN'])){
      
        //Preenche a variavel com as informações passadas pelo usuario que esta tentando atualizar
        $user->tipo_user = $_POST['tipoUsuario'];
        $user->nome = $_POST['nome'];
        $user->cpf = $_POST['cpf'];
        $user->senha = $_POST['senha'];
        $user->email = $_POST['email'];
        $user->descricao = $_POST['descricao'];
        $user->data_nascimento = $_POST['dataN'];

        //Chama a função que atualiza as informações e depois redireciona o usuario de volta para a página principal
        $user->atualizar();
        header('location:index.php?status=success');
        exit;
    }

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/formularioEditarUser.php';
    include __DIR__.'/includes/footer.php';
