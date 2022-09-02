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
    echo '<div class="dados_utilizador">
        <img src="../avatars/'.$_SESSION['avatar'].'"><span>'.$_SESSION['user'].'</span> | <a href="logout.php">Logout</a>
    </div>';


    //--------------------------------------------------------
    //novo post
    echo '<div class="novo_post"><a href="editor_post.php">Novo post</a></div>';


    //--------------------------------------------------------
    //apresentação dos posts do nosso fórum

    include 'config.php';

    $ligacao = new PDO("mysql:dbname=$base_dados;host=$host", $user, $password);

    //buscar os dados dos posts
    $sql="SELECT * FROM posts INNER JOIN users ON posts.id_user = users.id_user ORDER BY data_post DESC";
    $motor = $ligacao->prepare($sql);
    $motor->execute();
    $ligacao = null;

    if ($motor->rowCount() == 0) {

        echo '<div class="erro">Não existem posts no fórum.</div>';
        
    } else {

        //foram encontrados posts na base de dados
        foreach ($motor as $post) {

            //dados do post
            $id_post = $post['id_post'];
            $id_user = $post['id_user'];
            $titulo = $post['titulo'];
            $mensagem = $post['mensagem'];
            $data_post = $post['data_post'];

            //dados do utilizador
            $username = $post['username'];
            $avatar = $post['avatar'];

            echo '<div class="post">';
            
            //dados do user
            echo '<img src="../avatars/avatar.jpg"'.$avatar.'">';
            echo '<span id="post_username">'.$username.'</span>';
            echo '<span id="post_titulo">'.$titulo.'</span>';
            echo '<hr>';
            echo '<div id="post_mensagem">'.$mensagem.'</div>';

            //data e hora da mensagem/post
            echo '<div id="post_data">'.$data_post.'</div>';

            echo '</div>';

        }
    }

    //--------------------------------------------------------
    include 'rodape.php';

?>