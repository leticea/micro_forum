<?php

    //LOGOUT

    session_start();
    include 'cabeçalho.php';

    $mensagem = "Página não disponível para visitantes.";
    if (isset($_SESSION['user']))
    $mensagem = 'Até a próxima, '.$_SESSION['user'].'!';

    //faz o logout do utilizador
    unset($_SESSION['user']);

    //apresenta a caixa com a mensagem
    echo '<div class="login_sucesso">'.$mensagem.'<br><br><a href="index.php">Início</a></div>';

    include 'rodape.php';
    
?>