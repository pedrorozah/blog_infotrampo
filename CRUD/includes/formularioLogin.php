<main>

    <section>
        <a href="index.php">
            <button class="btn btn-success"> Voltar </button>
        </a>
    </section>

    <h2 class="mt-5" ><?=TITLE?> </h2>
    <form method="post" class="mt-5">
        
        <div class="form-group">

        <div class="form-group">
            <label> Email: </label>
            <input type="email" class="form-control" name='email'>
        </div>

        <div class="form-group">
            <label> Senha: </label>
            <input type="password" class="form-control" name='senha'>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success mt-4">Confirmar</button>
        </div>

    </form>

</main>