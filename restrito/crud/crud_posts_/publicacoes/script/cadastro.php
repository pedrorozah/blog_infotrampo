<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado - Cadastro</title>
</head>

<body>

    <?php
    include "../../conexao.php";

    $tipo_publicacao = clear($conn, $_POST['tipo_publicacao']);
    $titulo = clear($conn, $_POST['titulo']);
    $descricao = clear($conn, $_POST['descricao']);
    $estado = clear($conn, $_POST['estado']);
    $cidade = clear($conn, $_POST['cidade']);

    $sql = "INSERT INTO publicacao (titulo, descricao, estado, cidade, tipo_publicacao) VALUES ('$titulo','$descricao', '$estado', '$cidade', $tipo_publicacao);";

    if (mysqli_query($conn, $sql)) {
        echo "Publicação criada com Sucesso! <br>";
    } else
        echo mysqli_error($conn);
    ?>

    <br>
    <a href="../cadastrar.php" class="btn-voltar">Voltar</a>

</body>

</html>