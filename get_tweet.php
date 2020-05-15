<?php

session_start();
        
if (!isset($_SESSION['usuario'])) {
    header('location: index.php?erro=1');
    }

  //Classe de conexão com o bd
  require_once('db.class.php');

  $id_usuario = $_SESSION['id_usuario'];

  //instância da classe
  $objDb = new db();
  $link = $objDb->conecta_mysql();

  //Insert no bd, criando a variável SQL --- query de Insert
  $sql = " SELECT * FROM tweet ORDER BY data_inclusao DESC ";

  //executa a query de conexão com bd
  mysqli_query($link, $sql);




?>