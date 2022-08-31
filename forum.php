<?php

    //FÓRUM
    session_start();
    if (!isset($_SESSION['user'])) {

        include 'cabeçalho.php';
        echo '<div class="erro">Não tem permissão para ver o conteúdo do fórum.<br><br>
        <a href="index.php">Retornar</a>    
        </div>';
        include 'rodape.php';
        exit;
    }

    //--------------------------------------------------------
    include 'cabeçalho.php';

    //--------------------------------------------------------
    //dados do utilizador que está logado
    echo '<div>
        <img src="/opt/lampp/htdocs/'.$_SESSION['avatar'].'"><span>'.$_SESSION['user'].'</span> | <a href="logout.php">Logout</a>
    </div>';


    //--------------------------------------------------------
    include 'rodape.php';

?>