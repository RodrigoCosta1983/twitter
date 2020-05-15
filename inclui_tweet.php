<?php

    session_start();
        
        if (!isset($_SESSION['usuario'])) {
            header('location: index.php?erro=1');
        }


    //Classe de conexão com o bd
    require_once('db.class.php');
    
    $texto_tweet = $_POST['texto_tweet'];
    $id_usuario = $_SESSION['id_usuario'];

    //Verifico se as variáveis estão vazias
    if($texto_tweet == '' || $id_usuario == ''){
        die();
    }

     //instância da classe
     $objDb = new db();
     $link = $objDb->conecta_mysql();

     //Insert no bd, criando a variável SQL --- query de Insert
     $sql = "INSERT INTO tweet(id_usuario, tweet)values('$id_usuario','$texto_tweet') ";
     
     //executa a query de conexão com bd
     mysqli_query($link, $sql);


?>
