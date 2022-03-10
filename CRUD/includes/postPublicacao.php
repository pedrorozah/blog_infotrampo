<main>
    <h2 class="mt-5"><?= TITLE ?> </h2>
    

    <section>
        <a href="index.php">
            <button class="btn btn-success"> Voltar </button>
        </a>
        <form method="post" class="mt-1">
            <button method="post" type="submit" name="denunciar" class="btn btn-danger mb-5"> Denunciar esta postagem </button>
        </form>
    </section>
        <?=$result?>
        <div class="form-group">
               
                <label>
                    <h4> Tipo Publicacao <?= ($publicacao->tipo_publicacao == 'Empregador' ? 'Estou contratando' : 'Estou oferecendo um serviço')?></h4>
                </label>
        </div>

        <div class="form-group">
            <label for="titulo"> 
                <h4> Título: <?= $publicacao->titulo ?> </h4>
            </label>
        </div>

        <div class="form-group">
            <label for="descricao"> 
                <h4> Descrição: </h4>
                <br> 
                <h3> <?= $publicacao->descricao ?> </h3>
            </label>
                
            <div class="form-group">
                <label for="estado"> Estado: </label>
                <select name="estado" id="estado" class="form-control">
                    <option value="<?= $publicacao->estado ?>">
                        <?php echo $publicacao->estado ?>
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label for="cidade"> Cidade: </label>
                <select name="cidade" id="cidade" class="form-control">
                    <option value="<?= $publicacao->cidade ?>">
                        <?php echo $publicacao->cidade ?>
                    </option>
                </select>
            </div>
</main>