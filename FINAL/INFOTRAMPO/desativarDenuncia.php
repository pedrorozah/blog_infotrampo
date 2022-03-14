<?php
    require __DIR__.'/vendor/autoload.php';
    use \App\Entity\Denuncia;
    use App\Sessao\LogSessao;
    
    //Força o usuario a estar logada para poder acessar essa páginaa
    LogSessao::requireLog();

    //Define o titulo dessa página
    define('TITLE','Desativar Denuncia');

    //Confere se o ID passado na hora de chamar está pagina existe e se ele é numerico
    if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
        header('location: index.php?status=error');
        exit;
    }

    //Preenche a variavel de Denuncia com os dados do usuario correpondente ao ID passado
    $denuncia = new Denuncia;
    $denuncia = Denuncia::getDenuncia($_GET['id']);

    //Confere se a pessoa que está tentando desativar a Denuncia é um Administador
    LogSessao:: requireValidation($_GET['id']);

    //Confere se a registro dessa denuncia no banco de dados, caso não haja retorna o usuario e informa que houve um erro
    if (!$denuncia instanceof Denuncia) {
      header('location: index.php?status=error');
      exit;
    }

    //Confere se a pessoa Confirmou que deseja desativar a denuncia
    if(isset($_POST['desativar'])){
        //Chama a função que desativa a denuncia e o redireciona de volta para a aba denuncias
        $denuncia->desativar();
        header('location:registrosDenuncia.php?status=success');
        exit;
    }

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/confirmarDesativarDenuncia.php';
    include __DIR__.'/includes/footer.php';
