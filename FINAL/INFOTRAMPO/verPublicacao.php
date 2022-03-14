<?php
require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Publicacao;
use App\Entity\Usuario;
use App\Sessao\LogSessao;

//Exige que a pessoa esteja logada para acessar essaa página
LogSessao::requireLog();

//Define o titulo da página
define('TITLE', 'Postagem');

//Confere se o ID passado na hora de chamar essa página é um ID existente e se ele é numérico
if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: index.php?status=error1');
    exit;
}

//Pega os dados da publicação com base no ID que foi passado
$publicacao = Publicacao::getPublicacao($_GET['id']);
$autor = Usuario::getUser($publicacao->id_autor);

//Confere se existem uma publicação com aquele ID dentro do banco de dados
if (!$publicacao instanceof Publicacao) {
    header('location: index.php?status=error2');
    exit;
}

//Pega as informações do Usuario Logado
$userLog = LogSessao::getUserLog();
$userP=$userLog;

//Preenche informações diferentes a serem mostradas caso o usuario seja ou não um Administrador ou o Autor da postagem
$result='';
if ($userP['tipo_user']=='administrador'||$userP['id']==$publicacao->id_autor) {
    $result .=
    '<a href="editarPublicacao.php?id=' . $publicacao->id_publicacao . '">
        <button type="button" class="btn-azul">Editar</button>
    </a>
    <a href="excluirPublicacao.php?id=' . $publicacao->id_publicacao . '">
        <button type="button" class="btn-vermelho">Excluir</button>
    </a>'
;
}

//Verifica se quem esta vendo a postagem Clicou para denuncia-la e se sim o redireciona para a aba de denuncia
if(isset($_POST['denunciar'])){
    $redirect='location:cadastrarDenunciar.php?id='.($publicacao->id_publicacao);
    header($redirect);
    exit;
};    

//Chama as páginas que fazem parte da Aba Publicação
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/postPublicacao.php';
include __DIR__ . '/includes/footer.php';
