<?php
    $mensagem = '';
    
    //Verifica se o usuario digitou as Credenciais e informa que houve um erro caso esteja incorreto 
    if (isset($_GET['status'])) {
        switch ($_GET['status']) {
            case 'error4':
                $mensagem = '<div class="alert alert-danger"> Email ou Senha estão errados </div>';
                break;
        }
    }
?>

<body background="img/infotrampo.png">
    <header>
        <!-- LOGIN -->
        <div class="container">
            <div class="card">
                <h1> Login </h1>
                <?=$mensagem?>
                <form method="post">
                    <div class="label-float">
                        <input type="text" name='email' required>
                        <label for="usuario"> Usuário </label>
                    </div>

                    <div class="label-float">
                        <input type="password" required class="form-control" name='senha'>
                        <label for="senha"> Senha </label>
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </div>

                    <div class="justify-center">
                        <button>Entrar</button>
                    </div>
                    <div class="justify-center">
                        <hr>
                    </div>
                </form>
                <div class="login-paragrafo">
                    <p>Não tem uma conta? <a href="cadastrar">Cadastre-se</a></p>
                </div>
            </div>
        </div>
    </header>
</body>

</html>