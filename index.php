<?php 

    //INDEX
    session_start();
    $sessao_user = null;

    //unset($_SESSION['user']);

    if (isset($_SESSION['user'])) {

        include 'cabeçalho.php';
        echo '<div class="mensagem"><strong>'.$_SESSION['user'].'</strong> já se encontra logado no site.<br><br>
        <a href="forum.php">Avançar</a></div>';
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