<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar POSTS</title>
</head>

<body>
    <form class="form-base" action="script/cadastro.php" method="POST">
        <h1>Cadastrar Serviços e Trabalhos</h1>
        <div class="form-campo">
            <label for="titulo">Título</label>
            <br>
            <input type="text" name="titulo">
        </div>
        <div class="form-campo">
            <label for="descricao">Descrição</label>
            <br>
            <input type="text" name="descricao">
        </div>
        <!-- Podemos colocar o dropdown mostrando todas as regiões -->
        <div class="form-campo">
            <label for="estado">Estado</label>
            <br>
            <select name="estado">
                <option value="opcao1">Dropdown</option>
                <option value="opcao2">Com todas os Estados</option>
            </select>
        </div>
        <div class="form-campo">
            <label for="cidade">Cidade</label>
            <br>
            <select name="cidade">
                <option value="opcao1">Dropdown</option>
                <option value="opcao2">Com todas as cidades</option>
            </select>
        </div>
        <input type="hidden" name="tipo_publicacao" value="1">
        <br>
        <div class="form-campo">
            <input type="submit" class="btn">
        </div>
    </form>
    <br>
    <a href="index_posts.php">Voltar</a>


</body>

</html>