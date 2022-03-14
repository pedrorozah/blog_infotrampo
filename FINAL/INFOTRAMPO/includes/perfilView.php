<body  class="bg-warning">
    <!-- CONTEÚDO-->
    <section class="box">
        <div class="container">
        <div class="containerP">
            <div class="telaP">
                <h2>Perfil</h2>
            </div>
            <div class="containerP">
                <form action="#" method="POST">
<!--
                    <div class="img">
                        <a target="_blank" href="">
                       
                            <img src=""  alt="imagem do perfil do usuario" width="110" height="90">
                        </a>
                    </div>-->
                    <div>
                        <h1 class="name"><?=$userLog['nome']?></h1>
                    </div>

                    <div>
                        <p class="cpf"> <strong> Cpf: </strong> <?=$userLog['cpf']?> </p>
                    </div>    

                    <div>
                        <p class="email"> <strong> Email: </strong> <?=$userLog['email']?></p>
                    </div>

                    <div>
                        <p class="descricao"> <strong> Descrição: </strong> <?=$userLog['descricao']?></p>
                    </div>

                    <div>
                        <p class="dataNascimento"> <strong> Data de Nascimento: </strong> <?=date('d/m/Y', strtotime($userLog['data_nascimento']))?> </p>
                    </div>
                                 
                </form>
            
        </div>
        <div class="containerP">
            <div>
                <form action="#" method="POST">

        			<div class="col-md-6">
            			<p class="publicacao"> Pulicações: <!-- conexão com o banco que representa o email: <?=$nomeDaCoisa?>  --> </p>
        			</div>     
        		</div>
                                 
            </form>
                
        </div>
            
    </div>
    </div>
    </section>
</body>
</html>
