<?php

/* Dependências */

use app\Entity\Publicacao;
use App\Entity\Usuario;
use App\Sessao\LogSessao;

//Exige que o usuario esteja logado para acessar essa página
LogSessao::requireLog();

//Recebe se houve algum erro e preenche uma mensagem de acordo com isso
$mensagem = '';
if (isset($_GET['status'])) {
    switch ($_GET['status']) {
        case 'success':
            $mensagem = '<div class="alert alert-success">Executado com sucesso!</div>';
            break;
        case 'error':
            $mensagem = '<div class="alert alert-danger">Processo não foi executado com sucesso!</div>';
            break;
    }
}

//Preenche as informações das publicações em uma tabela, e mostra informações diferentes de acordo com se o usuario é um Cliente ou um Administrador
$button = '';
$resultado = '';
foreach ($publicacoes as $publicacao) {
    $userA   = Usuario::getUser($publicacao->id_autor);
    $nomeAutor = $userA->nome;
    if ($userLog['tipo_user'] == 'administrador') {
        $button = '<a href="registrosDenuncia.php?id=' . $userA->id . '">
                              <button type="button" class="btn-vermelho">Denuncias</button>
                        </a>';
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
    } else {
        $resultado .= '
                <tr>
                    <td>' . $nomeAutor . '</td>
                    <td>' . ($publicacao->tipo_publicacao == 'Empregador' ? 'Empregador' : 'Trabalhador') . '</td>
                    <td class="titulo">' . $publicacao->titulo . '</td>
                    <td>' . $publicacao->estado . '</td>
                    <td>' . $publicacao->cidade . '</td>
                    <td>' . date('d/m/Y', strtotime($publicacao->data_publicacao)) . '</td>
                    <td>
                        <a href="verPublicacao.php?id=' . $publicacao->id_publicacao . '">
                            <button type="button" class="btn-verde">Ir para a Postagem</button>
                        </a>
                    </td>
                </tr>
                <tr><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td></tr>';
    };
}
?>
<body background="img/infotrampo.png">
    <main>
        <?= $mensagem ?>
        <div class="container">

            <section>
                <div class="cardList">
                    <section>
                        <a href="cadastrarPublicacao.php">
                            <button class="btn-verde"> Criar Publicação </button>
                        </a>
                    </section>
                    <table>
                        <thead>
                            <th>Autor</th>
                            <th>Tipo de Publicação</th>
                            <th>Título</th>
                            <th>Estado</th>
                            <th>Cidade</th>
                            <th>Data de Publicação</th>
                            <th><?= $button ?></th>
                        </thead>
                        <tbody>

                            <?= $resultado ?>

                        </tbody>
                    </table>
                </div>
            </section>
        </div>

    </main>