<?php
require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Usuario;
use \App\Sessao\LogSessao;
use \App\Entity\Publicacao;

//Força o usuario a estar Deslogado para poder se Logar
LogSessao::requireLog();

//Define o titulo da página
define('TITLE', 'Perfil');

$buttonU = '';

//pega as informções do usuario logado
$userLog = LogSessao::getUserLog();

//Verifica se foi informado um ID na hora de chamar essa página, caso tenha 
//sido preenche as informações com base nesse ID, caso não tenha sido, preenche com as informações do Usuario Logado
if (isset($_GET['id'])) {
    $userPerfil = Usuario::getUser($_GET['id']);
} else {
    $userPerfil = Usuario::getUser($userLog['id']);

    if ($userLog['tipo_user'] == 'administrador') {
        $buttonU = '<a href="users.php">
                    <button type="button" class="btn-verde">Lista Usuarios Cadastrados</button>
                </a>';
    }
}
$resultado = '';
$button = '';

//chama a função que retornas as publicações do usuario com o ID passado na hora de chamar a função
$publicacoes = Publicacao::getPublicacaoUser($userPerfil->id);

//preenche itens de uma tabela com base nas informações trazidas pela função anterior
foreach ($publicacoes as $publicacao) {
    //Pega as informações do autor da postagem com base no ID do autor daquela publicação
    $userA   = Usuario::getUser($publicacao->id_autor);
    
    $nomeAutor = $userA->nome;
        $resultado .= '<tr>
                    <td>' . $nomeAutor . '</td>
                    <td>' . ($publicacao->tipo_publicacao == 'Empregador' ? 'Empregador' : 'Trabalhador') . '</td>
                    <td class="titulo">' . $publicacao->titulo . '</td>
                    <td>' . $publicacao->estado . '</td>
                    <td>' . $publicacao->cidade . '</td>
                    <td>' . date('d/m/Y', strtotime($publicacao->data_publicacao)) . '</td>
                    <td>
                        <a href="editarPublicacao.php?id=' . $publicacao->id_publicacao . '">
                            <button type="button" class="btn-azul">Editar</button>
                        </a>
                        <a href="excluirPublicacao.php?id=' . $publicacao->id_publicacao . '">
                            <button type="button" class="btn-vermelho">Excluir</button>
                        </a>
                        <a href="verPublicacao.php?id=' . $publicacao->id_publicacao . '">
                            <button type="button" class="btn-verde">Ir para a Postagem</button>
                        </a>
                    </td>
                </tr>
                <tr><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td></tr>
                ';
    
}


include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/perfilView.php';
