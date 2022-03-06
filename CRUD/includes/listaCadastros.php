<?php
    
    $mensagem ='';
    if (isset($_GET['status'])) {
        switch ($_GET['status']) {
            case 'success':
                $mensagem ='<div class="alert alert-success">Executado com sucesso!</div>';
                break;
            case 'error':    
                $mensagem ='<div class="alert alert-danger">Processo não foi executado com sucesso!</div>';
                break;
        }
    }    

    $resultado = '';
    foreach ($users as $user) {
        $resultado .='<tr>
            <td>'.$user->id.'</td>
            <td>'.($user->tipo_user =='Usuario tipo cliente'?'Cliente' : 'Administrador').'</td>
            <td>'.$user->nome.'</td>
            <td>'.$user->cpf.'</td>
            <td>'.$user->email.'</td>
            <td>'.$user->descricao.'</td>
            <td>'.date('d/m/Y',strtotime($user->data_nascimento)).'</td>
            <td>
                <a href="editar.php?id='.$user->id.'">
                    <button type="button" class="btn btn-primary">Editar</button>
                </a>
                <a href="excluir.php?id='.$user->id.'">
                    <button type="button" class="btn btn-danger">Excluir</button>
                </a>
            </td>
        </tr>';
    }
?>

<main>

    
    <?=$mensagem?>
    <section>
        <table class="table bg-dark text-light">
            <thead>
                <th>ID</th>
                <th>Tipo de Usuário</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Email</th>
                <th>Descrição</th>
                <th>Data de Nascimento</th>
                <th>Opções</th>
            </thead>
            <tbody>

                <?= $resultado ?>

            </tbody>
        </table>
    </section>

</main>