<?php 
    $mensagem ='';
    if (isset($_GET['status'])) {
        switch ($_GET['status']) {
            case 'success':
                $mensagem ='<div class="alert alert-success">Executado com sucesso!</div>';
                break;
            case 'error4':    
                $mensagem ='<div class="alert alert-danger">Email ou senha incorretos</div>';
                break;
        }
    }
?>

<main>

    <section>
        <a href="index.php">
            <button class="btn btn-success"> Voltar </button>
        </a>
    </section>

    <h2 class="mt-5" ><?=TITLE?> </h2>
    <form method="post" class="mt-5">
        
        <div class="form-group">
        <?=$mensagem?>
        <div class="form-group">
            <label> Email: </label>
            <input type="email" class="form-control" name='email'>
        </div>

        <div class="form-group">
            <label> Senha: </label>
            <input type="password" required class="form-control" name='senha'>
        </div>

        <div class="form-group">
            <button type="submit" required class="btn btn-success mt-4">Confirmar</button>
        </div>

    </form>

</main>