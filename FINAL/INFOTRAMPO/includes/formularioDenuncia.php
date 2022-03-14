<body background="img/cadastro.png">
    <main>
        <div class="container">
            <div class="opcoes">
                <div class="cardDenuncia">
                    <h2 class="mt-5"><?= TITLE ?> </h2>

                    <form method="post" class="mt-5">
                        <h4 style="color:Red"> <?= $alerta ?> </h4>
                        <div class="opcoes">
                            <div class="form-group">
                                <label> Qual a sua denuncia: </label>
                                <textarea required class="form-control" name='descriçãoDenuncia'></textarea>
                            </div>
                            <button type="submit" class="btn-verde">Enviar</button>
                    </form>


                </div>
                <a href="index.php">
                    <button class="btn-vermelho"> Cancelar </button>
                </a>
            </div>
        </div>
    </main>