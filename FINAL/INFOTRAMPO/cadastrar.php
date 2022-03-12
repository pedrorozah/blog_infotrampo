<?php
    require __DIR__.'/vendor/autoload.php';
    use App\Entity\Usuario;
    use App\Sessao\LogSessao;
    
    //Define o titulo da página
    define('TITLE','Cadastrar Usuario');
    
    LogSessao::requireLogOut();

    $alerta='';
    
    //Confere se as informações existem pra só então chamar a função que cadastra
    if(isset($_POST['nome'],$_POST['cpf'],$_POST['senha'],$_POST['email'],$_POST['descricao'],$_POST['dataN'])){
        $user = new Usuario;
        $userV = Usuario::getLogin($_POST['email']);
        
        //Calcula a Idade de quem esta se cadastrando 
        $data = $_POST['dataN'];
            list($ano, $mes, $dia) = explode('-', $data);
            $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
            $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
            $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);

        //Verifica se o email que a pessoa esta tentando cadastrar ja foi cadastrado antes    
        if ($userV instanceof Usuario) {
          
            $alerta= 'O email digitado já está em uso';
            
        }
        //Verifica se que esta tentando se cadastrar tem mais de 18 anos
        elseif($idade<18){
           
            $alerta= 'Voce precisa ser maior de Dezoito anos para se registar';
        
        }else{
            //Preenche a variavel com as informações passadas pela pessoa que esta tentando se cadastrar
            $user->nome = $_POST['nome'];
            $user->cpf = $_POST['cpf'];
            $user->senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
            $user->email = $_POST['email'];
            $user->descricao = $_POST['descricao'];
            $user->data_nascimento = $_POST['dataN'];
            
            //Com as informações prenchidas chama a função que ira Cadastrar essaa informações
            $user->cadastrar();

            //Após cadastrar Loga o usuario automaticamente na sua conta e o redireciona pra pagina principal
            LogSessao::login($user);
            header('location:index.php?status=success');
            exit;
        };
    }

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/formularioDeCadastro.php';
    include __DIR__.'/includes/footer.php';
