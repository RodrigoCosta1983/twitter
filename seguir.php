<?php

    session_start();
        
        if (!isset($_SESSION['usuario'])) {
            header('location: index.php?erro=1');
        }


    //Classe de conexão com o bd
    require_once('db.class.php');
    
    $id_usuario = $_SESSION['id_usuario'];
    $seguir_id_usuario = $_POST['seguir_id_usuario'];

    //Verifico se as variáveis estão vazias
    if($id_usuario == '' || $seguir_id_usuario == ''){
        die();
    }

     //instância da classe
     $objDb = new db();
     $link = $objDb->conecta_mysql();

     //Insert no bd, criando a variável SQL --- query de Insert
     $sql = "INSERT INTO usuarios_seguidores(id_usuario, seguindo_id_usuario)values($id_usuario,$seguir_id_usuario) ";
     echo $sql;
     
     //executa a query de conexão com bd
     mysqli_query($link, $sql);


?>
