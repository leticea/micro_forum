<?php 

    //VERIFICAR OS DADOS DE LOGIN
    session_start();
    if (isset($_SESSION['user'])) {

        include 'cabeçalho.php';
        echo '<div class="mensagem">Já se encontra logado no site.<br><br><a href="forum.php">Avançar</a></div>';
        include 'rodape.php';
        exit;
    }

    //--------------------------------------------------------------
    include 'cabeçalho.php';

    $utilizador = "";
    $password_utilizador = "";

    if (isset($_POST['text_utilizador'])) {

        $utilizador = $_POST['text_utilizador'];
        $password_utilizador = $_POST['text_password'];
    }
   
    //verificar se os campos foram preenchidos
    if ($utilizador == "" || $password_utilizador == "") {

        //ERRO - campos não preenchidos
        echo '<div class="erro">
            Não foram preenchidos os campos necessários.<br><br>
            <a href="index.php">Tente novamente</a>
        </div>';
        include 'rodape.php';
        exit;
    }

    echo 'Sucesso';

    //--------------------------------------------------------------
    include 'rodape.php';

?>