<?php
    require __DIR__ . '/vendor/autoload.php';
    
    /* Dependências */

    use App\Entity\Denuncia;
    use App\Entity\Publicacao;
    use App\Sessao\LogSessao;
    
    $alerta='';
    //Chama a função que exige que a pessoa esteja logada para acessar
    LogSessao::requireLog();
    
    //Define o titulo da Pagina
    define('TITLE', 'Denunciar Publicação');
    
    //Pega as informações de Quem esta denunciando essa postagem
    $userLog = LogSessao::getUserLog();
        
    //Confere se o ID passado na hora de chamar essa página é um ID existente e se ele é numérico
    if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
        header('location: index.php?status=error1');
        exit;
    }

    //Pega os dados da publicação com base no ID que foi passado
    $publicacao = Publicacao::getPublicacao($_GET['id']);

    //Confere se existem uma publicação com aquele ID dentro do banco de dados
    if (!$publicacao instanceof Publicacao) {
        header('location: index.php?status=error2');
        exit;
    }
    //Confere se as informações necessarias pra cadastrar a publicação existem antes de cadastrar 
    $userLog = LogSessao::getUserLog();
    if (isset($_POST['descriçãoDenuncia'])) {
            $denuncia = new Denuncia;
            $denuncia->id_autorDenuncia = $userLog['id'];
            $denuncia->descricao_denuncia = $_POST['descriçãoDenuncia'];
            $denuncia->id_publicacaoDenunciada = $_GET['id'];
            $denuncia->cadastrar();
            header('location:publicacoes.php?status=success');
            exit;
   }
    
    include __DIR__ . '/includes/header.php';
    include __DIR__ . '/includes/formularioDenuncia.php';
    include __DIR__ . '/includes/footer.php';
    
?>