<body background="img/4.png">
    <main>

        <div class="tituloPost">
            <h2 class="mt-5"><?= $publicacao->titulo ?></h2>
        </div>
        <div class="container">
            <div class="cardPost">

                <div class="form-group">

                    <label>
                        <h4> Tipo:</h4>
                        <h3> <?= ($publicacao->tipo_publicacao == 'Empregador' ? 'Estou contratando pessoas' : 'Estou oferecendo os meus serviços') ?></h3>
                    </label>
                </div>

                <div class="form-group">
                    <label>
                        <h4> Autor:</h4>
                        <h3> <?= $autor->nome ?> </h3>
                    </label>
                </div>

                <div class="form-group">
                    <label>
                        <h4> Contato:</h4>
                        <h3> <?= $autor->email ?> </h3>
                    </label>
                </div>

                <div class="form-group">
                    <label for="descricao">
                        <h4> Descrição: </h4>
                        <h3> <?= $publicacao->descricao ?> </h3>
                    </label>

                    <label>
                        <h4> Data da Postagem: </h4>
                        <h3> <?= date('d/m/Y', strtotime($publicacao->data_publicacao)) ?> as <?= date('h:i-a', strtotime($publicacao->data_publicacao)) ?></h3>
                    </label>

                    <div class="form-group">
                        <label for="estado">
                            <h4> Estado: </h4>
                        </label>
                        <select name="estado" id="estado" class="form-control">
                            <option value="<?= $publicacao->estado ?>">
                                <?php echo $publicacao->estado ?>
                            </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="cidade">
                            <h4> Cidade: </h4>
                        </label>
                        <select name="cidade" id="cidade" class="form-control">
                            <option value="<?= $publicacao->cidade ?>">
                                <?php echo $publicacao->cidade ?>
                            </option>
                        </select>
                    </div>
                </div>
                <div class="opcoes">
                    <a href="index.php">
                        <button class="btn-verde"> Voltar </button>
                    </a>
                    <?= $result ?>
                </div>
            </div>

        </div>
        <div class="opcoes">
            <section>
                <form method="post" class="mt-1">
                    <button method="post" type="submit" name="denunciar" class="btn btn-danger mb-5"> Denunciar esta postagem </button>
                </form>
            </section>
        </div>
    </main>