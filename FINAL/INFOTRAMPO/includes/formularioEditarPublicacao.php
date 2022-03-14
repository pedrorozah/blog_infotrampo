<body background="img/1.png">
    <main class="text-light">
        <div class="container">
            <div class="cardPubli">
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
                        <p class="infoExtra">&nbsp &nbsp Descreva o tipo de serviço que voce esta oferecendo, a região em que voce atua, preços, horarios de atendimento, outros meios de contato, e qualquer outra informação que julgar importante.</p>
                        <input class="form-control" name='descricao' value="<?= $publicacao->descricao ?>">


                        <!-- ADICIONAR Select com todos os estados. -->
                        <div class="form-group">
                            <label for="estado"> Estado: </label>
                            <select name="estado" id="estado" class="form-control">
                                <option value="<?= $publicacao->estado ?>">
                                    <?php echo $publicacao->estado ?>
                                </option>
                                <option value="Parana">Parana</option>
                            </select>
                        </div>


                        <!-- ADICIONAR Select com todos as cidade de acordo com o estado. -->
                        <div class="form-group">
                            <label for="cidade"> Cidade: </label>
                            <select name="cidade" id="cidade" class="form-control">
                                <option value="<?= $publicacao->cidade ?>">
                                    <?php echo $publicacao->cidade ?>
                                </option>
                                <option value="Foz Do iguaçu">Foz Do Iguaçu</option>
                                <option value="Cascavel">Cascavel</option>
                                <option value="Toledo">Toledo</option>
                                <option value="Campo Largo">Campo Largo</option>
                            </select>
                        </div>
                        <div class="opcoes">
                            <div class="form-group">
                                <button type="submit" class="btn-verde">Enviar</button>
                            </div>
                        </div>

                </form>
            </div>
        </div>
    </main>