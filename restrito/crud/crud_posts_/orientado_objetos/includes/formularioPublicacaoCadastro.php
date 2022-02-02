<main>

    <section>
        <a href="index.php">
            <button class="btn btn-success"> Voltar </button>
        </a>
    </section>
    <h2 class="mt-5" ><?=TITLE?> </h2>
    <form method="post" class="mt-5">
        
        <div class="form-group">
            <label>Tipo Publicação</label>
            <div>
                <div class="form-check form-check-inline">
                    <label class="form-control">
                        <input type="radio" name="tipoPublicacao" value="Empregador"> Quero contratar!
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-control">
                        <input type="radio" name="tipoPublicacao" value="Trabalhador"> Quero ser contrado!
                    </label>
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <label> Título: </label>
            <input type="text" class="form-control" name='titulo' >
        </div>

        <div class="form-group">
            <label> Descrição: </label>
            <textarea type="text" class="form-control" name='descricao'></text_area>
        </div>

        <!-- ADICIONAR Select com todos os estados. -->
        <div class="form-group">
            <label for="estado"> Estado: </label>
            <select name="estado" id="estado">
                <option value="option1_Estado"></option>
                <option value="option2_Estado"></option>
            </select>
        </div>

        <!-- ADICIONAR Select com todos as cidade de acordo com o estado. -->
        <div class="form-group">
            <label for="cidade"> Cidade: </label>
            <select name="cidade" id="cidade">
                <option value="option1_Cidade"></option>
                <option value="option2_Cidade"></option>
            </select>
        </div>

        <!-- ASSISTIR VÍDEO SOBRE INSERÇÃO DE DATA AUTOMÁTICA -->
        <div class="form-group">
            <label for="data_publicacao"> Data de Nascimento: </label>
            <input type="date" class="form-control" name='data_publicacao'>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success mt-4">Enviar</button>
        </div>

    </form>

</main>