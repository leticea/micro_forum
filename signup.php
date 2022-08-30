<?php

    //SIGNUP
    $id_sessao = session_id();
    if(empty($id_sessao)) session_start();

    //--------------------------------------------------------
    //cabeçalho
    include 'cabeçalho.php';


    //verificar se foram inseridos dados de utilizador
    if(!isset($_POST['btn_submit'])) {

        apresentarFormulario();
    }


    //--------------------------------------------------------
    //rodapé
    include 'rodape.php';


    //--------------------------------------------------------
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



?>