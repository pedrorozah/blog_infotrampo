<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "blog";

$conn = mysqli_connect($server, $user, $pass, $db);

if ($conn) {
    echo "Conectado <br> <br>";
} else {
    mysqli_connect_error($conn);
}

function mensagem($texto, $class)
{
    echo "<div class='$class'> 
            $texto
        </div>";
}

function mostra_data($data)
{
    $d = explode('-', $data);
    $escreve = $d[2] . "/" . $d[1] . "/" . $d[0];
    return $escreve;
}

function clear($conn, $texto_puro)
{
    $texto = mysqli_real_escape_string($conn, $texto_puro);
    $texto = htmlspecialchars($texto);
    return $texto;
}
