<?php

use app\Entity\Publicacao;
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
foreach ($publicacoes as $publicacao) {
    $userA   = Usuario::getUser($publicacao->id_autor);
    $nomeAutor = $userA->nome;
        if ($userLog['tipo_user']=='administrador') {            
            $resultado .= '<tr>
                    <td>' . $nomeAutor . '</td>
                    <td>' . ($publicacao->tipo_publicacao == 'Empregador' ? 'Empregador' : 'Trabalhador') . '</td>
                    <td>' . $publicacao->titulo . '</td>
                    <td>' . $publicacao->estado . '</td>
                    <td>' . $publicacao->cidade . '</td>
                    <td>' . date('d/m/Y', strtotime($publicacao->data_publicacao)) . '</td>
                    <td>
                        <a href="editarPublicacao.php?id=' . $publicacao->id_publicacao . '">
                            <button type="button" class="btn btn-primary">Editar</button>
                        </a>
                        <a href="excluirPublicacao.php?id=' . $publicacao->id_publicacao . '">
                            <button type="button" class="btn btn-danger">Excluir</button>
                        </a>
                        <a href="verPublicacao.php?id=' . $publicacao->id_publicacao . '">
                            <button type="button" class="btn btn-success">Ir para a Postagem</button>
                        </a>
                    </td>
                </tr>';
    }else{
            $resultado .= '<tr>
                <td>' . $nomeAutor . '</td>
                <td>' . ($publicacao->tipo_publicacao == 'Empregador' ? 'Empregador' : 'Trabalhador') . '</td>
                <td>' . $publicacao->titulo . '</td>
                <td>' . $publicacao->estado . '</td>
                <td>' . $publicacao->cidade . '</td>
                <td>' . date('d/m/Y', strtotime($publicacao->data_publicacao)) . '</td>
                <td>
                    <a href="verPublicacao.php?id=' . $publicacao->id_publicacao . '">
                        <button type="button" class="btn btn-success">Ir para a Postagem</button>
                    </a>
                </td>
        </tr>';
    };
}
?>

<main>
    <section>
        <a href="index.php">
            <button class="btn btn-success"> Voltar </button>
        </a>
    </section>
    <section>
        <a href="cadastrarPublicacao.php">
            <button class="btn btn-success"> Criar Publicação </button>
        </a>
    </section>
    <?= $mensagem ?>
    <section>
        <table class="table bg-dark text-light mt-4">
            <thead>
                <th>Autor</th>
                <th>Tipo de Publicação</th>
                <th>Título</th>
                <th>Estado</th>
                <th>Cidade</th>
                <th>Data de Publicação</th>
            </thead>
            <tbody>

                <?= $resultado ?>

            </tbody>
        </table>
    </section>

</main>