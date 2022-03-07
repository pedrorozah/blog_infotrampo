<?php

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
    $resultado .= '<tr>
            <td>' . $publicacao->id_publicacao . '</td>
            <td>' . ($publicacao->tipo_publicacao == 'Usuario tipo cliente' ? 'Cliente' : 'Administrador') . '</td>
            <td>' . $publicacao->titulo . '</td>
            <td>' . $publicacao->descricao . '</td>
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
            </td>
        </tr>';
}
?>

<main>

    <section>
        <a href="cadastrarPublicacao.php">
            <button class="btn btn-success"> Cadastrar</button>
        </a>
    </section>
    <?= $mensagem ?>
    <section>
        <table class="table bg-dark text-light mt-4">
            <thead>
                <th>ID_Publicação</th>
                <th>Tipo de Publicação</th>
                <th>Título</th>
                <th>Descrição</th>
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