<?php
// TEM QUE FAZER O EDITAR
require __DIR__ . '/vendor/autoload.php';

use \App\Entity\usuario;


define('TITLE', 'Editar Perfil');


if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: index.php?status=error1');
    exit;
}

$user = usuario::getUser($_GET['id']);


if (!$user instanceof usuario) {
    header('location: index.php?status=error2');
    exit;
}
//echo "<pre>";print_r($user); echo"</pre>";
if (isset($_POST['tipoUsuario'], $_POST['nome'], $_POST['cpf'], $_POST['senha'], $_POST['email'], $_POST['descricao'], $_POST['dataN'])) {
    // $user = new usuario;
    $user->tipo_user = $_POST['tipoUsuario'];
    $user->nome = $_POST['nome'];
    $user->cpf = $_POST['cpf'];
    $user->senha = $_POST['senha'];
    $user->email = $_POST['email'];
    $user->descricao = $_POST['descricao'];
    $user->data_nascimento = $_POST['dataN'];
    $user->atualizar();
    header('location:index.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario.php';
include __DIR__ . '/includes/footer.php';
