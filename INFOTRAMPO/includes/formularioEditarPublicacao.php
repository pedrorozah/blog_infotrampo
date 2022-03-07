<main>
    <section>
        <a href="index_publicacao.php">
            <button class="btn btn-success"> Voltar </button>
        </a>
    </section>

    <h2 class="mt-5"><?= TITLE ?> </h2>
    <form method="post" class="mt-5">

        <div class="form-group">
            <label>Tipo Publicacao</label>
            <div>
                <div class="form-check form-check-inline">
                    <label class="form-control">
                        <input type="radio" name="tipoPublicacao" checked value="Empregador"> Quero contratar!
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-control">
                        <input type="radio" name="tipoPublicacao" value="Trabalhador" <?= $publicacao->tipo_publicacao == 'Trabalhador' ? 'checked' : '' ?>> Quero ser contrado!
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="titulo"> Título: </label>
            <input type="text" class="form-control" name='titulo' value="<?= $publicacao->titulo ?>">
        </div>

        <div class="form-group">
            <label for="descricao"> Descrição: </label>
            <input class="form-control" name='descricao' value="<?= $publicacao->descricao ?>">


            <!-- ADICIONAR Select com todos os estados. -->
            <div class="form-group">
                <label for="estado"> Estado: </label>
                <select name="estado" id="estado" class="form-control">
                    <option value="<?= $publicacao->estado ?>">
                        <?php echo $publicacao->estado ?>
                    </option>
                    <option value="option1">Opção1</option>
                    <option value="option2">Opção2</option>
                </select>
            </div>


            <!-- ADICIONAR Select com todos as cidade de acordo com o estado. -->
            <div class="form-group">
                <label for="cidade"> Cidade: </label>
                <select name="cidade" id="cidade" class="form-control">
                    <option value="<?= $publicacao->cidade ?>">
                        <?php echo $publicacao->cidade ?>
                    </option>
                    <option value="option1">Opção1</option>
                    <option value="option2">Opção2</option>
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success mt-4">Enviar</button>
            </div>

    </form>
</main>