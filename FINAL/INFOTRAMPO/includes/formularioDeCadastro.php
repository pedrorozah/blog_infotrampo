<body background="img/cadastro.png">
    <header>
        
        <!-- CADASTRO -->
        <div class="container">
            <div class="card">
                <h1>Cadastrar</h1>
                <h4 style="color:Red; text-align:center;"> <?=$alerta?> </h4>
                <form method="post" class="mt-5">
                    <div class="label-float">
                        <input type="text" name='nome' placeholder="" required>
                        <label for='nome'>Nome</label>
                    </div>
                    <div class="label-float">
                        <input type="text" name="cpf" placeholder="" required>
                        <label for='cpf'>CPF</label>
                    </div>
                    <div class="label-float">
                        <input type='password' name="senha" placeholder="" required>
                        <label for="senha">Senha</label>
                        <i id="verSenha" class="fa fa-eye" aria-hidden="true"></i>
                    </div>
                    <div class="label-float">
                        <input type='email' name="email" placeholder="" required>
                        <label for="email">Email</label>
                    </div>
                    <div style="color:black;">
                        <label>Descrição:</label>
                        <br>
                        <label style="color:rgb(61, 61, 60);">Insira uma breve descrição sobre você e os tipos de serviços os quais voce presta.</label>
                        <div class="label-float">
                        <textarea name="descricao" required> </textarea> 
                        </div>
                    </div>
                    <div class="label-float">
                        <span> Data Nascimento</span>
                        <input type='date' name='dataN' placeholder="" required>
                    </div>
                    <div class="justify-center">
                        <button type="submit">Cadastrar</button>
                    </div>
                    <div class="justify-center">
                        <hr>
                    </div>
                    <div class="login-paragrafo">
                        <p>Possui uma conta? <a href="logar.php">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </header>
</body>
</html>