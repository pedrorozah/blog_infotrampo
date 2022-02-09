<?php
    require __DIR__.'/vendor/autoload.php';
    use \App\Entity\publicacao;
    define('TITLE','Cadastrar Publicação');

    // trocar "$_POST['dataN']" para inserir data atual na hora da criação da publicação.
    if(isset($_POST['tipoPublicacao'],$_POST['titulo'],$_POST['descricao'],$_POST['estado'],$_POST['cidade'],/* $_POST['dataN']*/)){
        $publicacao = new publicacao;
        $publicacao->tipo_publicacao = $_POST['tipoPublicacao'];
        $publicacao->titulo = $_POST['titulo'];
        $publicacao->descricao = $_POST['descricao'];
        $publicacao->estado = $_POST['estado'];
        $publicacao->cidade = $_POST['cidade'];
        //$publicacao->data_nascimento = $_POST['dataN'];
        $publicacao->cadastrar();

        header('location:index.php?status=success');
        exit;
    }

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/formularioPublicacaoCadastro.php';
    include __DIR__.'/includes/footer.php';
