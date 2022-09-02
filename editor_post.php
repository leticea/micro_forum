<?php 

    //EDITAR / CRIAR POST
    session_start();
    if (!isset($_SESSION['user'])) {

        include 'cabeçalho.php';
        echo '<div class="erro">Não tem permissão para ver esta página.<br><br>
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
    //formulário para construção dos posts
    echo '<div>
        <form class="form_post" method="post" action="post_add.php">

        <h3>Post<h3><hr><br>

        Título:<br>
        <input type="text" name="text_titulo" size="67"><br><br>

        Mensagem:<br>
        <textarea rows="10" cols="80" name="text_mensagem"></textarea><br><br>

        <input type="submit" value="Gravar"><br><br>

        <a href="forum.php">Voltar</a>
        
        </form> 
    </div>';


    //--------------------------------------------------------
    include 'rodape.php';

?>