<?php 

    use \App\Sessao\LogSessao;
    $userLog = LogSessao::getUserLog();
        
    $userL = $userLog ?'<a href="perfil.php">'.
            $userLog['nome'].
        '</a> <a href="deslogar.php" class="ml-2">
            <button class="btn-vermelho">Sair</button>
        </a>
        <a href="publicacoes.php" style="margin-left: 10px;">
                    <button class="btn-azul">Publicações</button>
        </a>'
         :
            'Visitante
        <a href="cadastrar.php">
            <button class="btn-verde" style="margin-left: 10px;">Cadastrar</button>
        </a>
        <a href="logar.php">
            <button class="btn-azul" style="margin-left: 10px;">Login</button>
        </a>'
        ;


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="includes/css/styles.css">
    <!-- JavaScript -->
    <script src="includes/js/cadastro.js"></script>
    <!-- Icon -->
    <link rel="shortcut icon" href="img\icon.png" type="image/x-png"/>
    <!-- Bootsstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>InfoTrampo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 
    <!-- LOGO style="background-color: black;"-->
    <div class="nav-logo" >
        <svg preserveAspectRatio="xMidYMid meet" data-bbox="24.545 24.5 150.999 151" viewBox="24.545 24.5 150.999 151" height="45" width="45" xmlns="http://www.w3.org/2000/svg" data-type="color" role="presentation" aria-hidden="true"><defs><style>#comp-kwnk6i73_r_comp-kwe60zob svg [data-color="1"] {fill: #FFD503;}
            #comp-kwnk6i73_r_comp-kwe60zob svg [data-color="2"] {fill: #000000;}</style></defs>
            <g>
                <path fill="#ffc40e" d="M163 99.5c0 34.518-27.982 62.5-62.5 62.5S38 134.018 38 99.5 65.982 37 100.5 37 163 64.982 163 99.5z" data-color="1"></path>
                <path d="M67 50.5c0-15 11.9-26 28.3-26h9.4c16.4 0 28.3 10.9 28.3 26 0 1.3-1.1 2.4-2.4 2.4s-2.4-1.1-2.4-2.4c0-12.3-9.9-21.2-23.6-21.2h-9.4c-13.7 0-23.6 8.9-23.6 21.2 0 1.3-1.1 2.4-2.4 2.4S67 51.8 67 50.5zm.5 15.7c1.7 3.4 5.7 4.8 9.2 3.3 4.2-1.8 12.8-4.9 23.3-4.9 9.3 0 18.7 3.2 23.5 5.2.9.4 1.8.5 2.7.5 2.6 0 5-1.4 6.3-3.9l2.7-5.4c.6-1.2.1-2.6-1.1-3.2-1.2-.6-2.6-.1-3.2 1.1l-2.7 5.4c-.6 1.1-1.8 1.6-2.9 1.1-5.1-2.1-15.2-5.5-25.3-5.5-10.8 0-19.7 2.9-25.2 5.3-1.2.5-2.5 0-3.1-1.1l-2.6-5.3c-.6-1.2-2-1.6-3.2-1.1-1.2.6-1.6 2-1.1 3.2l2.7 5.3zM100 48.1c-3.6 0-17.6 2.1-19.2 2.4-1.3.2-2.2 1.4-2 2.7.2 1.2 1.2 2 2.3 2h.4c4.2-.6 15.8-2.3 18.5-2.3 2.8 0 14.3 1.7 18.5 2.3 1.3.2 2.5-.7 2.7-2 .2-1.3-.7-2.5-2-2.7-1.6-.3-15.6-2.4-19.2-2.4zm-44.7 76.4c-.5-1.2.1-2.6 1.3-3.1l23.6-9.4c.1-4.6-1.3-8.8-1.3-8.8v-.1c-3.7-3.8-6.5-8.5-7.8-14-1.2-5.3-1.7-12.2-1.7-12.5-.1-1.3.9-2.4 2.2-2.5 1.3-.1 2.4.9 2.5 2.2 0 .1.5 6.9 1.6 11.8 2.7 11.2 12.7 19.1 24.3 19.1 11.6 0 21.6-7.8 24.3-19.1 1.2-4.9 1.6-11.7 1.6-11.8.1-1.3 1.2-2.3 2.5-2.2 1.3.1 2.3 1.2 2.2 2.5 0 .3-.5 7.3-1.8 12.5-1.3 5.4-4 10.2-7.7 13.9-.5 2.5-.9 6-1 9.1l23.1 9.3c1.2.5 1.8 1.9 1.3 3.1-.4.9-1.3 1.5-2.2 1.5-.3 0-.6-.1-.9-.2l-18.7-7.5c-5.3 8.7-11.9 12.4-22.9 12.4-10.9 0-17.6-3.6-22.9-12.4l-18.7 7.5c-.3.1-.6.2-.9.2-.7 0-1.6-.6-2-1.5zm44.7-12.7c-5.6 0-10.8-1.5-15.3-4.2.4 3.4.5 7.8-1.2 11.6 3.9 4.8 8.8 6.7 16.5 6.7 7.7 0 12.5-1.9 16.5-6.7-1.3-3.2-1.1-8.1-.7-11.9-4.6 2.9-10 4.5-15.8 4.5zm75.1 48.2c.4.6.6 1.4.3 2.1-2.6 7.8-11.5 13.4-21.1 13.4-8.6 0-16.4-4.7-20.5-11.9-.2.1-.5.1-.7.1H67c-.3 0-.5-.1-.7-.1-4.1 7.3-11.9 11.9-20.5 11.9-9.6 0-18.5-5.6-21.1-13.4-.2-.7-.1-1.5.3-2.1.4-.6 1.2-1 1.9-1h15.5l3.3-3.3v-7.5l-3.3-3.3H26.9c-.8 0-1.6-.4-2-1.1-.4-.7-.5-1.6-.1-2.3 4.1-7.9 12.3-13.1 21-13.1 8.6 0 16.4 4.7 20.5 11.9.2-.1.5-.1.7-.1h66c.3 0 .5.1.7.1 4.1-7.3 11.9-11.9 20.5-11.9s16.9 5.1 21 13.1c.4.7.3 1.6-.1 2.3-.4.7-1.2 1.1-2 1.1H160l-3.3 3.3v7.5l3.3 3.3h13.2c.7 0 1.4.3 1.9 1zm-5.8 3.7H159c-.6 0-1.2-.2-1.7-.7l-4.7-4.7c-.4-.4-.7-1-.7-1.7v-9.4c0-.6.2-1.2.7-1.7l4.7-4.7c.4-.4 1-.7 1.7-.7h9.8c-3.6-4.4-9-7.1-14.5-7.1-8 0-15.1 5.1-17.8 12.6-.4 1.2-1.8 1.9-3 1.4-1-.3-1.5-1.3-1.5-2.2H68.1c0 1-.6 1.9-1.6 2.2-1.2.4-2.6-.2-3-1.4-2.7-7.5-9.8-12.6-17.8-12.6-5.6 0-10.9 2.7-14.5 7.1h12.2c.6 0 1.2.2 1.7.7l4.7 4.7c.4.4.7 1 .7 1.7v9.4c0 .6-.2 1.2-.7 1.7L45 163c-.4.4-1 .7-1.7.7H30.7c3 4.2 8.8 7.1 15 7.1 8 0 15.1-5.1 17.8-12.6.4-1.2 1.8-1.9 3-1.4 1 .3 1.6 1.3 1.6 2.2h63.8c0-1 .6-1.9 1.6-2.2 1.2-.4 2.6.2 3 1.4 2.7 7.5 9.8 12.6 17.8 12.6 6.1 0 12-2.9 15-7.1z" fill="#160e37" data-color="2"></path>
            </g>
        </svg>
        <a href="index.php">InfoTrampo</a>

        <div class="info-user">
                 <?=$userL?> 
        </div>

    </div>
    <!-- Bootstrap CSS -->
     </head>

    
