<?php

session_start();
        
if (!isset($_SESSION['usuario'])) {
    header('location: index.php?erro=1');
    }

  //Classe de conexão com o bd
  require_once('db.class.php');

  $nome_pessoa = $_POST['nome_pessoa'];
  $id_usuario = $_SESSION['id_usuario'];

  //instância da classe
  $objDb = new db();
  $link = $objDb->conecta_mysql();

  //Insert no bd, criando a variável SQL --- query de Insert
  $sql = " SELECT * from usuarios where usuario like '%$nome_pessoa%' and id <> '$id_usuario' ";

  //executa a query de conexão com bd
  $resultado_id = mysqli_query($link, $sql);
    
    if($resultado_id){
        
      while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
        echo '<a href="#" class="list-group-item">';
          echo '<strong>'.$registro['usuario'].'</strong> <small> - '.$registro['email'].'</small>';
          echo '<p class="list-group-item-text pull-right">';
            echo '<button type="buton" class="btn btn-default btn_seguir" data-id_usuario="'.$registro['id'].'" >Seguir</button>';
            echo '<button type="buton" class="btn btn-primary btn_deixar_de_seguir" data-id_usuario="'.$registro['id'].'" >Deixar de Seguir</button>';
          echo '</p>';
          echo '<div class="clearfix"></div>';
        echo '</a>';
      }
    }else{
        echo 'Erro na consulta de tweets no Banco de dados';
      }
?>