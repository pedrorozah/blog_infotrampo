<main>

    <section>
        <a href="index.php">
            <button class="btn btn-success"> Voltar </button>
        </a>
    </section>
    <h2 class="mt-5" ><?=TITLE?> </h2>
    <form method="post" class="mt-5">
        
        <h4 style="color:Red"> <?=$alerta?> </h4>
        
        <div class="form-group">
            <label> Qual a sua denuncia: </label>
            <textarea required class="form-control" name='descriçãoDenuncia'></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success mt-4">Enviar</button>
        </div>

    </form>

</main>