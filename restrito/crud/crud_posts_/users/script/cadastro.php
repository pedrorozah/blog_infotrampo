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

    $tipo_usuario = clear($conn, $_POST['tipo_usuario']);
    $nome_completo = clear($conn, $_POST['nome_completo']);
    $cpf = clear($conn, $_POST['cpf']);
    $rg = clear($conn, $_POST['RG']);
    $telefone = clear($conn, $_POST['telefone']);
    $email = clear($conn, $_POST['email']);
    $descricao = clear($conn, $_POST['descricao']);
    $data_nascimento = clear($conn, $_POST['data_nascimento']);

    $sql = "INSERT INTO usuario (tipo_usuario, nome_completo, cpf, RG, telefone, email, descricao, data_nascimento) VALUES ($tipo_usuario, '$nome_completo', '$cpf', '$rg', '$telefone', '$email', '$descricao', '$data_nascimento');";

    if (mysqli_query($conn, $sql)) {
        echo "Usuário cadastrado com sucesso! <br>";
    } else
        echo mysqli_error($conn);
    ?>

    <br>
    <a href="../cadastrar.php" class="btn-voltar">Voltar</a>

</body>

</html>