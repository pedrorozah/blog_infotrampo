<body background="img/4.png">
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
                            <h1 class="name"><?= $userPerfil->nome ?></h1>
                        </div>

                        <div>
                            <p class="cpf"> <strong> Cpf: </strong> <?= $userPerfil->cpf ?> </p>
                        </div>

                        <div>
                            <p class="email"> <strong> Email: </strong> <?= $userPerfil->email ?></p>
                        </div>

                        <div>
                            <p class="descricao"> <strong> Descrição: </strong> <?= $userPerfil->descricao ?></p>
                        </div>

                        <div>
                            <p class="dataNascimento"> <strong> Data de Nascimento: </strong> <?= date('d/m/Y', strtotime($userPerfil->data_nascimento)) ?> </p>
                        </div>
                        <div class="opcoes">
                            <?= $buttonU ?>
                        </div>
                    </form>

                </div>
                <div class="containerP">
                    <p> Pulicações:
                    <div class="text-light">
                        <div class="container">
                            <div class="cardList">
                                <table>
                                    <thead>
                                        <th>Autor</th>
                                        <th>Tipo de Publicação</th>
                                        <th>Título</th>
                                        <th>Estado</th>
                                        <th>Cidade</th>
                                        <th>Data de Publicação</th>
                                        <th><?= $button ?></th>
                                    </thead>
                                    <tbody>

                                        <?= $resultado ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
</body>

</html>