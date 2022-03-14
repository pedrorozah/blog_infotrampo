<body background="img/3.png">
    <main>
        <div class="container">
            <div class="opcoes">
                <div class="cardDenuncia">
                    <section>
                        <a href="index.php">
                            <button class="btn btn-success"> Voltar </button>
                        </a>
                    </section>

                    <h2 class="mt-5"> Excluir Conta </h2>
                    <form method="post" class="mt-5">

                        <div class="form-group">
                            <p> Confirmar exclusão da conta <strong><?= $user->nome ?></strong>?</p>
                        </div>

                        <div class="form-group">
                            <a href="index.php">
                                <button type="button" class="btn btn-success mt-4">Cancelar</button>
                            </a>
                            <button type="submit" name="excluir" class="btn btn-danger mt-4">Excluir</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </main>
</body>