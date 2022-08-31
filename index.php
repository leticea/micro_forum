<?php 

    //INDEX
    session_start();
    $sessao_user = null;
    if (isset($_SESSION['user'])) {

        include 'cabeçalho.php';
        echo '<div class="mensagem">Já se encontra logado no site.<br><br><a href="forum.php">Avançar</a></div>';
        include 'rodape.php';
        exit;
    }

    //--------------------------------------------------------
    //cabeçalho
    include 'cabeçalho.php';

    if ($sessao_user == null) {

        include 'login.php';
    }
    
    //--------------------------------------------------------
    //rodapé
    include 'rodape.php';

?>