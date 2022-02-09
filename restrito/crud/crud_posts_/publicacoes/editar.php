<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Publicações</title>
</head>

<body>
    <!-- Nesse caso, devemos padronizar o campo, para que não haja erro na hora da consulta no banco de dados. -->
    <form action="#" method="POST">
        <div>
            <label for="cpf">Digite o seu CPF:</label>
            <br>
            <input type="text" name="cpf">
        </div>
        <br>
        <input type="submit" value="Pesquisar">
    </form>
    <br>
    <?php

    // EDITAR SERVIÇOS E TRABALHOS //
    include "../conexao.php";
    // $id = $_GET['id'] ?? '';
    $cpf = $_POST['cpf'];
    $sql = "SELECT id_usuario FROM usuario WHERE cpf = '$cpf'";
    if (mysqli_query($conn, $sql)) {
        $linha = mysqli_fetch_assoc(mysqli_query($conn, $sql));
        $id = $linha['id_usuario'];
        echo $id;
    } else {
        echo "Erro!";
    }

    // PASSAR ID USANDO SESSIONS...(1);
    $sql = "SELECT * FROM publicacao WHERE id_usuario = $id AND tipo_publicacao = 1";
    $dados = mysqli_query($conn, $sql);
    $linha = mysqli_fetch_assoc($dados);
    ?>

    <form class="form-base" action="script/edita_script.php" method="POST">
        <h1>Editar Publicação</h1>
        <div class="form-campo">
            <label for="titulo">Título</label>
            <br>
            <input type="text" name="titulo" value="<?php echo $linha['titulo']; ?>">
        </div>
        <div class="form-campo">
            <label for="descricao">Descrição</label>
            <br>
            <input type="text" name="descricao" value="<?php echo $linha['descricao']; ?>">
        </div>
        <div class="form-campo">
            <label for="estado">Estado</label>
            <br>
            <select name="estado">
                <option value="opcao1"><?php echo $linha['estado']; ?></option>
                <option value="opcao2">Dropdown com todas os Estados</option>
            </select>
        </div>
        <div class="form-campo">
            <label for="cidade">Cidade</label>
            <br>
            <select name="cidade">
                <option value=" opcao1"><?php echo $linha['cidade']; ?></option>
                <option value="opcao2">Dropdown com todas as Cidades</option>
            </select>
        </div>
        <br>
        <div class="form-campo">
            <input type="submit" class="btn" value="Salvar alterações">
            <input type="hidden" name="id" value="<?php echo $linha['id_publicacao']; ?>">
        </div>
    </form>
    <br>
    <a href="index_posts.php">Voltar</a>
</body>

</html>