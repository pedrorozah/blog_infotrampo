<body background="img/1.png">
    <main>
        <div class="text-light">
            <div class="container">
                <div class="cardPubli">
                    <section>
                        <a href="index.php">
                            <button class="btn btn-success"> Voltar </button>
                        </a>
                    </section>

                    <h2 class="mt-5"><?= TITLE ?> </h2>
                    <form method="post" class="mt-5">

                        <div class="form-group">
                            <label>Tipo Usuário</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <label class="form-control">
                                        <input type="radio" name="tipoUsuario" checked value="cliente"> Cliente
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-control">
                                        <input type="radio" name="tipoUsuario" value="administrador" <?= $user->tipo_user == 'administrador' ? 'checked' : '' ?>> Administrador
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label> Nome Completo: </label>
                            <input type="text" class="form-control" name='nome' value="<?= $user->nome ?>">
                        </div>

                        <div class="form-group">
                            <label> CPF: </label>
                            <input type="text" class="form-control" name='cpf' value="<?= $user->cpf ?>">
                        </div>

                        <div class="form-group">
                            <label> Email: </label>
                            <input type="text" class="form-control" name='email' value="<?= $user->email ?>">
                        </div>

                        <div class="form-group">
                            <label> Descrição: </label>
                            <textarea class="form-control" name='descricao'><?= $user->descricao ?></textarea>
                        </div>

                        <div class="form-group">
                            <label> Data de Nascimento: </label>
                            <input type="date" class="form-control" name='dataN' value="<?= $user->data_nascimento ?>">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success mt-4">Enviar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </main>
</body>