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
    //verificar se é para editar o post
    $pid = -1;
    $editar = false;
    $mensagem = "";
    $titulo = "";

    if (isset($_REQUEST['pid'])) {

        $pid = $_REQUEST['pid'];
        $editar = true;

        //vai buscar os dados do post à bd
        include 'config.php';
        $ligacao = new PDO("mysql:dbname=$base_dados;host=$host", $user, $password);
        $motor = $ligacao->prepare("SELECT * FROM posts WHERE id_post = ".$pid);
        $motor->execute();

        $dados = $motor->fetch(PDO::FETCH_ASSOC);
        $ligacao = null;

        $titulo = $dados['titulo'];
        $mensagem = $dados['mensagem'];

    }






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

        <input type="hidden" name="id_user" value='.$_SESSION['id_user'].'>
        <input type="hidden" name="id_post" value='.$pid.'>

        Título:<br>
        <input type="text" name="text_titulo" size="67" value='.$titulo.'><br><br>

        Mensagem:<br>
        <textarea rows="10" cols="80" name="text_mensagem">'.$mensagem.'</textarea><br><br>

        <input type="submit" value="Gravar"><br><br>

        <a href="forum.php">Voltar</a>
        
        </form> 
    </div>';


    //--------------------------------------------------------
    include 'rodape.php';

?>