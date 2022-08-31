<?php 

    //INDEX
    $id_sessao = session_id();
    if (empty($id_sessao)) session_start();


    //--------------------------------------------------------
    //cabeçalho
    include 'cabeçalho.php';

    if ($id_sessao == null) {

        include 'login.php';
    }
    

    //--------------------------------------------------------
    //rodapé
    include 'rodape.php';



?>