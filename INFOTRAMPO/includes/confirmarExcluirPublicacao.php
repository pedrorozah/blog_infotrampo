<main>
    <section>
        <a href="index_publicacao.php">
            <button class="btn btn-success"> Voltar </button>
        </a>
    </section>

    <h2 class="mt-5"> Excluir publicação </h2>
    <form method="post" class="mt-5">

        <div class="form-group">
            <p> Confirmar exclusão da publicação <strong><?= $publicacao->titulo ?></strong>?</p>
        </div>

        <div class="form-group">
            <a href="index_publicacao.php">
                <button type="button" class="btn btn-success mt-4">Cancelar</button>
            </a>
            <button type="submit" name="excluir" class="btn btn-danger mt-4">Excluir</button>
        </div>

    </form>
</main>