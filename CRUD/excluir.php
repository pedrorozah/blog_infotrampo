<?php
    require __DIR__.'/vendor/autoload.php';
    use \App\Entity\usuario;
    use \App\Entity\listaCadastros;
    define('TITLE','Editar Perfil');


    if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
        header('location: index.php?status=error');
        exit;
    }

    $user = usuario::getUser($_GET['id']);
    //

    if (!$user instanceof usuario) {
      header('location: index.php?status=error');
      exit;
    }
   //echo "<pre>";print_r($user); echo"</pre>";
    if(isset($_POST['excluir'])){
        $user->excluir();
        header('location:index.php?status=success');
        exit;
    }

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/confirmarExcluir.php';
    include __DIR__.'/includes/footer.php';
