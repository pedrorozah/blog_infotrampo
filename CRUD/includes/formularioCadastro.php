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
            <label>Tipo Usuário</label>
            <div>
                <div class="form-check form-check-inline">
                    <label class="form-control">
                        <input type="radio" name="tipoUsuario" checked value="Usuario tipo cliente"> Cliente
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-control">
                        <input type="radio" name="tipoUsuario" value="Usuario tipo administrador"> Administrador
                    </label>
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <label> Nome Completo: </label>
            <input type="text" class="form-control" name='nome' >
        </div>

        <div class="form-group">
            <label> CPF: </label>
            <input type="text" class="form-control" name='cpf'>
        </div>

        <div class="form-group">
            <label> Senha: </label>
            <input type="text" class="form-control" name='senha'>
        </div>
    
        <div class="form-group">
            <label> Email: </label>
            <input type="text" class="form-control" name='email'>
        </div>

        <div class="form-group">
            <label> Descrição: </label>
            <textarea class="form-control" name='descricao'></textarea>
        </div>

        <div class="form-group">
            <label> Data de Nascimento: </label>
            <input type="date" class="form-control" name='dataN'>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success mt-4">Enviar</button>
        </div>

    </form>

</main>