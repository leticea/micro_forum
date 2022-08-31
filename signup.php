<?php

    //SIGNUP
    $id_sessao = session_id();
    if (empty($id_sessao)) session_start();

    //-------------------------------------------------------------------
    //cabeçalho
    include 'cabeçalho.php';


    //verificar se foram inseridos dados de utilizador
    if (!isset($_POST['btn_submit'])) {

        apresentarFormulario();

    } else {

        registrarUtilizador();
    }

    //-------------------------------------------------------------------
    //rodapé
    include 'rodape.php';

    //-------------------------------------------------------------------
    //FUNÇÕES
    function apresentarFormulario()
    {
        //apresenta o formulário para adição de novo utilizador
        echo 
            '<form class="form_signup" method="post" action="signup.php?a=signup" enctype="multipart/form-data">
            
            <h3>Signup</h3><hr><br>

            Username:<br><input type="text" size="20" name="text_utilizador"><br><br>

            Password:<br><input type="password" size="20" name="text_password_1"><br><br>
            Repetir password:<br><input type="password" size="20" name="text_password_2"><br><br>

            <input type="hidden" name="MAX_FILE_SIZE" value="50000">
            Avatar:<input type="file" name="imagem_avatar"><br>
            <small>(Imagem do tipo <strong>JPG</strong>, tamanho máximo: <strong>50kb</strong>)</small><br><br>

            <input type="submit" name="btn_submit" value="Criar"><br><br>
            <a href="index.php">Voltar</a>
            
            </form>';
    }

    //-------------------------------------------------------------------
    function registrarUtilizador()
    {
        //executar as operações necessárias para o registro de um novo utilizador
        $utilizador = $_POST['text_utilizador'];
        $password_1 = $_POST['text_password_1'];
        $password_2 = $_POST['text_password_2'];

        //avatar
        $avatar = $_FILES['imagem_avatar'];
        $erro = false;

        //---------------------------------------------------------------
        //verificação de erros do utilizador
        if ($utilizador == "" || $password_1 == "" || $password_2 == "") {

            //ERRO - Não foram preenchidos os campos necessários
            echo '<div class="erro">Não foram preenchidos os campos necessários.</div>';
            $erro = true;

        } elseif ($password_1 != $password_2) {

            //ERRO - passwords não coincidem
            echo '<div class="erro">As passwords não coincidem.</div>';
            $erro = true;
        }

        //---------------------------------------------------------------
        //erros do Avatar
        elseif ($avatar['name'] != "" && $avatar['type'] != "image/jpeg") {

            //  ERRO - Arquivo de imagem inválido
            echo '<div class="erro">Arquivo de imagem inválido.</div>';
            $erro = true;

        } elseif ($avatar['name'] != "" && $avatar['size'] > $_POST['MAX_FILE_SIZE']) {

            //  ERRO - Arquivo de imagem maior que o permitido
            echo '<div class="erro">Arquivo de imagem maior que o permitido.</div>';
            $erro = true;
        }

        //verificar se existiram erros
        if ($erro) {

            apresentarFormulario();
            //incluir o rodapé
            exit;
        }

        //--------------------------------------------------------------- 
        //PROCESSAMENTO DO REGISTRO DO NOVO UTILIZADOR 
        include 'config.php';

        $ligacao = new PDO("mysql:dbname=$base_dados;host=$host", $user, $password);

        //---------------------------------------------------------------
        //verificar se já existe um utilizador com o mesmo username
        $motor = $ligacao->prepare("SELECT username FROM users WHERE username = ?");
        $motor->bindParam(1, $utilizador, PDO::PARAM_STR);
        $motor->execute();

        if ($motor->rowCount() != 0) {

            //ERRO - utilizador já se encontra registrado
            echo '<div class="erro">Já existe um membro do fórum com o mesmo username.</div>';
            $ligacao = null;
            apresentarFormulario();

            //incluir o rodapé do fórum
            include 'rodape.php';
            exit;

        } else {

            //registro do novo utilizador
            $motor = $ligacao->prepare("SELECT MAX(id_user) AS MaxID FROM users");
            $motor->execute();
            $id_temp = $motor->fetch(PDO::FETCH_ASSOC)['MaxID'];
            if ($id_temp == null)
                $id_temp = 0;
            else
                $id_temp++;
        }

        
        echo '<p>Terminado</p>';
    } 

?>