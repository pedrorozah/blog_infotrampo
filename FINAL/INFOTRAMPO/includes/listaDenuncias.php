<?php

/* Dependências */

use app\Entity\Denuncia;
use App\Entity\Usuario;
use App\Sessao\LogSessao;

//Exige que o usuario esteja logado
LogSessao::requireLog();

//Recebe se ocorreu algum erro e exibe uma mensagem de acordo com isso
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

//Preenche a tabela com as Denuncias recebidas do banco de dados, e de acordo se a denuncia esta Ativa ou Inativa mostra de maneira diferente
$resultado = '';
foreach ($denuncias as $denuncia) {
    $userA   = Usuario::getUser($denuncia->id_autorDenuncia);
    $nomeAutor = $userA->nome;
    if ($denuncia->status === 'ativo') {
        $resultado .= '<tr>
                        <td>' . $nomeAutor . '</td>
                        <td>' . $denuncia->id_denuncia . '</td>
                        <td>' . $denuncia->descricao_denuncia . '</td>
                        <td>' . $denuncia->status . '</td>
                        <td>' . date('d/m/Y', strtotime($denuncia->data_denuncia)) . '</td>
                        <td>
                            <a href="verPublicacao.php?id=' . $denuncia->id_publicacaoDenunciada . '">
                                <button type="button" class="btn btn-success">Ir para a Postagem</button>
                            </a>
                        </td>
                        <td>
                            <a href="desativarDenuncia.php?id=' . $denuncia->id_denuncia . '">
                                <button type="button" class="btn btn-danger">Marcar como Revisada</button>
                            </a>
                        </td>
                    </tr>
                    <tr><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td></tr>
                ';
    } else {
        $resultado .= '<tr>
                        <td>' . $nomeAutor . '</td>
                        <td>' . $denuncia->id_denuncia . '</td>
                        <td>' . $denuncia->descricao_denuncia . '</td>
                        <td>' . $denuncia->status . '</td>
                        <td>' . date('d/m/Y', strtotime($denuncia->data_denuncia)) . '</td>
                        <td>
                            <a href="verPublicacao.php?id=' . $denuncia->id_publicacaoDenunciada . '">
                                <button type="button" class="btn btn-success">Ir para a Postagem</button>
                            </a>
                        </td>
                        <td>
                            <h3>REVISADA</h3>
                        </td>
                    </tr>
                    <tr><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td></tr>
                    ';
    }
}
?>
<body background="img/cadastro.png">
    <main>
        <div class="container">
            <div class="cardList">
                <?= $mensagem ?>
                <section>
                    <table>
                        <thead>
                            <th>Denunciado por:</th>
                            <th>ID</th>
                            <th>Descrição da Denuncia</th>
                            <th>Status</th>
                            <th>Data da Denuncia</th>
                            <th>Postagem</th>
                            <th></th>
                        </thead>
                        <tbody>

                            <?= $resultado ?>

                        </tbody>
                    </table>

                </section>
            </div>
        </div>
    </main>