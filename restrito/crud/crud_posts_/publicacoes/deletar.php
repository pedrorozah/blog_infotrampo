<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Cadastro</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <form action="script/deleta_script.php" method="POST">
        <div>
            <label for="id">Digite o ID da Publicação a ser excluída</label>
            <br>
            <input type="text" name="id">
        </div>
        <div>
            <input type="submit">
        </div>
    </form>
    <br>
    <a href="index_posts.php" class="btn-voltar">Voltar</a>
</body>

</html>