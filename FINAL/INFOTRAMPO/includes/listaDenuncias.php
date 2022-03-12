<?php

use app\Entity\Denuncia;
use App\Entity\Usuario;
use App\Sessao\LogSessao;

LogSessao::requireLog();
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

<body class="bg-warning">
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