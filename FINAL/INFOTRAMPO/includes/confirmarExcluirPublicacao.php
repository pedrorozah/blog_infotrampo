<body background="img/1.png">
    <main>
        <div class="container">
            <div class="opcoes">
            <div class="cardDenuncia">
                <h2 class="mt-5"> Excluir publicação </h2>
                <form method="post" class="mt-5">

                    <div class="form-group">
                        <p> Confirmar exclusão da publicação <strong><?= $publicacao->titulo ?></strong>?</p>
                    </div>

                    <div class="form-group">
                        <a href="publicacoes.php">
                            <button type="button" class="btn-verde">Cancelar</button>
                        </a>
                        <button type="submit" name="excluir" class="btn-vermelho">Excluir</button>
                    </div>
                
                </form></div>
            </div>
        </div>
    </main>