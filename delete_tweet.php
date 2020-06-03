<?php

    session_start();
        
        if (!isset($_SESSION['usuario'])) {
            header('location: index.php?erro=1');
        }


    //Classe de conexão com o bd
    require_once('db.class.php');
    
    $id_usuario = $_SESSION['id_usuario'];
    $delete_tweet_usuario = $_POST['delete_tweet_usuario'];

    //Verifico se as variáveis estão vazias
    if($id_usuario == '' || $delete_tweet_usuario == ''){
        die();
    }


     //instância da classe
     $objDb = new db();
     $link = $objDb->conecta_mysql();

     //Insert no bd, criando a variável SQL --- query de Insert
     $sql = "DELETE tweet FROM `tweet` WHERE id_tweet = $delete_tweet_usuario AND $id_usuario = id_usuario";
    //echo $sql;
     //executa a query de conexão com bd
     mysqli_query($link, $sql);


?>
