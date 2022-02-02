<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuários</title>
</head>

<body>
    <form class="form-base" action="script/cadastro.php" method="POST">
        <h1>Cadastrar</h1>
        <div class="form-campo">
            <label for="tipo_usuario">Tipo Usuário</label>
            <br>
            <input type="text" name="tipo_usuario">
        </div>
        <div class="form-campo">
            <label for="nome_completo">Nome Completo</label>
            <br>
            <input type="text" name="nome_completo">
        </div>
        <div class="form-campo">
            <label for="cpf">CPF</label>
            <br>
            <input type="text" name="cpf">
        </div>
        <div class="form-campo">
            <label for="RG">RG</label>
            <br>
            <input type="text" name="RG">
        </div>
        <div class="form-campo">
            <label for="telefone">Telefone</label>
            <br>
            <input type="text" name="telefone">
        </div>
        <div class="form-campo">
            <label for="email">E-mail</label>
            <br>
            <input type="email" name="email">
        </div>
        <div class="form-campo">
            <label for="descricao">Descricao</label>
            <br>
            <input type="text" name="descricao">
        </div>
        <div class="form-campo">
            <label for="data_nascimento">Data de Nascimento</label>
            <br>
            <input type="date" name="data_nascimento">
        </div>
        <div class="form-campo">
            <input type="submit" class="btn">
        </div>
    </form>
    <br>
    <a href="index_users.php">Voltar</a>


</body>

</html>