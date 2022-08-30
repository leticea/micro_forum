<?php

    //INSTALL
    //criar a base de dados que suporta o site

    include 'config.php';

    //criar a base de dados
    $ligacao = new PDO("mysql:host=$host", $user, $password);
    $motor = $ligacao->prepare("CREATE DATABASE $base_dados");
    $motor->execute();
    $ligacao = null;

    echo '<p>Base de dados criada com sucesso.</p><hr>';

    //--------------------------------------------------------
    //abrir a base de dados para adicionar as tabelas
    $ligacao = new PDO("mysql:dbname=$base_dados;host=$host", $user, $password);

    //--------------------------------------------------------
    //tabela "users" - utilizadores do micro forum
    $sql="CREATE TABLE users(
            id_user         INT NOT NULL PRIMARY KEY,
            username        VARCHAR(30),
            pass            VARCHAR(100),  
            avatar          VARCHAR(250))";
    
    $motor = $ligacao->prepare($sql);
    $motor->execute();

    //--------------------------------------------------------
    //tabela "posts" - posts do micro forum

    $ligacao = null;




?>