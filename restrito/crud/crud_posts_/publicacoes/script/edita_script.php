<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cadastro</title>
</head>

<body>

    <?php
    include "../../conexao.php";

    $id = clear($conn, $_POST['id']);
    $titulo = clear($conn, $_POST['titulo']);
    $descricao = clear($conn, $_POST['descricao']);
    $estado = clear($conn, $_POST['estado']);
    $cidade = clear($conn, $_POST['cidade']);

    //$sql = "INSERT INTO `pessoas` (`nome`, `endereco`, `telefone`, `email`, `data_nascimento`) VALUES ('$nome', '$endereco' , '$telefone' , '$email', '$data_nascimento')";


    $sql = "UPDATE publicacao SET titulo = '$titulo', descricao = '$descricao', estado = '$estado', cidade = '$cidade' WHERE id_publicacao = $id";

    if (mysqli_query($conn, $sql)) {
        echo "Publicação editada com sucesso!";
    } else
        echo "Houve um erro ao editar a publicação!";
    ?>
    <br>
    <a href="../editar.php">Voltar</a>

</body>

</html>