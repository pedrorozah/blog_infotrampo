<?php
require __DIR__ . '/vendor/autoload.php';

/* Dependências */

use \App\Entity\Publicacao;
use App\Sessao\LogSessao;

//Chama a função que exige que a pessoa esteja logada para acessar
LogSessao::requireLog();

//Define o titulo da Pagina
define('TITLE', 'Cadastrar Sua Publicação');

//Pega as informações de Quem esta cadastrando essa postagem
$userLog = LogSessao::getUserLog();

//Confere se as informações necessarias pra cadastrar a publicação existem antes de cadastrar 
if (isset($_POST['tipoPublicacao'], $_POST['titulo'], $_POST['descricao'], $_POST['estado'], $_POST['cidade'])) {

    //Confere se a pessoa não deixou as opções de Estado e Cidade Vazias
    if ($_POST['estado'] == 'default' || $_POST['cidade'] == 'default') {
        header('location:index_publicacao.php?status=erro');
        exit;
    }

    //Preenche as informações passadas pelo autor da postagem na variavel antes de cadastrar
    $publicacao = new Publicacao;
    //Pega informação de quem esta fazendo a postagem da Sessão e prenche na variavel
    $publicacao->id_autor = $userLog['id'];
    $publicacao->tipo_publicacao = $_POST['tipoPublicacao'];
    $publicacao->titulo = $_POST['titulo'];
    $publicacao->descricao = $_POST['descricao'];
    $publicacao->estado = $_POST['estado'];
    $publicacao->cidade = $_POST['cidade'];
    
    //Chama a função que cadastra a Postagem e então leva o usuario de volta para a aba de publicações
    $publicacao->cadastrar();
    header('location:publicacoes.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formularioDePublicacaoCadastro.php';
include __DIR__ . '/includes/footer.php';
