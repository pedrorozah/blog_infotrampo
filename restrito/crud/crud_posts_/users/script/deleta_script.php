<?php
include "../../conexao.php";

$id = $_POST['id'];
$sql = "DELETE FROM usuario WHERE id_usuario = $id";

if (mysqli_query($conn, $sql)) {
    echo "Foi excluído com sucesso!";
} else
    echo "Não foi excluido!";
?>
<br>
<a href="../deletar.php" class="btn-voltar">Voltar</a>