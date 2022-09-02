<?php

    //GRAVA OU EDITA O POST
    session_start();
    if (!isset($_SESSION['user'])) {

        include 'cabeçalho.php';
        echo '<div class="erro">Não tem permissão para ver o conteúdo da págnia.<br><br>
        <a href="index.php">Retornar</a>    
        </div>';
        include 'rodape.php';
        exit;
    }

    //--------------------------------------------------------
    include 'cabeçalho.php';


    //--------------------------------------------------------
    //dados do utilizador que está logado
    echo '<div class="dados_utilizador">
        <img src="../avatars/'.$_SESSION['avatar'].'"><span>'.$_SESSION['user'].'</span> | <a href="logout.php">Logout</a>
    </div>';


    //buscar dados do formulário
    $id_user = $_POST['id_user'];
    $id_post = $_POST['id_post'];
    $titulo = $_POST['text_titulo'];
    $mensagem = $_POST['text_mensagem'];
    $editar = false;

    //verificar se os campos estão preenchidos
    if ($titulo == "" || $mensagem == "") {

        //ERRO - campos não preenchidos
        echo '<div class="erro">
            Não foram preenchidos os campos necessários.<br><br>
            <a href="editor_post.php">Tente novamente</a>
        </div>';
        include 'rodape.php';
        exit;
    }


    //--------------------------------------------------------
    include 'rodape.php';

?>