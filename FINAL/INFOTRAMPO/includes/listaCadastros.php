<?php
    
    use App\Sessao\LogSessao;
    LogSessao::requireLog();

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
    $button = '';


    foreach ($users as $user) {
        $userLog = LogSessao::getUserLog();

        if ($userLog['tipo_user']=='administrador') {
            
            $resultado .='<tr>
                <td>'.$user->id.'</td>
                <td>'.$user->tipo_user.'</td>
                <td>'.$user->nome.'</td>
                <td>'.$user->cpf.'</td>
                <td>'.$user->email.'</td>
                <td>'.date('d/m/Y',strtotime($user->data_nascimento)).'</td>
                <td>
                    <a href="editar.php?id='.$user->id.'">
                        <button type="button" class="btn-azul">Editar</button>
                    </a>
                    <a href="excluir.php?id='.$user->id.'">
                        <button type="button" class="btn-vermelho">Excluir</button>
                    </a>
                    <a href="perfil.php?id='.$user->id.'">
                        <button type="button" class="btn-verde">Acessar o Perfil</button>
                    </a>
                </td>
            </tr>';
        }else{
            $resultado .='<tr>
                <td>'.$user->id.'</td>
                <td>'.$user->tipo_user.'</td>
                <td>'.$user->nome.'</td>
                <td>'.$user->cpf.'</td>
                <td>'.$user->email.'</td>
                <td>'.date('d/m/Y',strtotime($user->data_nascimento)).'</td>
                <td>
                    <a href="perfil.php?id='.$user->id.'">
                        <button type="button" class="btn-verde">Acessar o Perfil</button>
                    </a>
                </td>
            </tr>';
        }
        
        
    }
?>

<main>
    
    <?=$mensagem?>
    <div class="container bg-warning">
    <section class="container bg-warning">
        <table class="table bg-dark text-light">
            <thead>
                <th>ID</th>
                <th>Tipo de Usuário</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Email</th>
                <th>Data de Nascimento</th>
                <th>    </th>
            </thead>
            <tbody>

                <?= $resultado ?>
                
            </tbody>
        </table>
    </section>
    </div>

</main>