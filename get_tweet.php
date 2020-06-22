

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
  $sql = " SELECT date_format(tweet.data_inclusao, '%d %b %Y %T') as data_hora,tweet.id_tweet as idtweet,tweet.id_usuario as iduser ,usuarios.usuario, tweet.tweet 
  FROM tweet 
  join usuarios 
  on  (tweet.id_usuario = usuarios.id)
  WHERE id_usuario = $id_usuario 
  OR id_usuario IN (select seguindo_id_usuario from usuarios_seguidores where id_usuario = $id_usuario)
  ORDER BY data_hora DESC";



  //executa a query de conexão com bd
  $resultado_id = mysqli_query($link, $sql);
    
    if($resultado_id){
        
      while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
        echo '<a href="#" class="list-group-item"';
          echo '<h4 class="list-group-item-heading"><b>'.ucfirst($registro['usuario']).'</b> <small> - '.$registro['data_hora'].'</small></h4>';
          echo '<p class="list-group-item-text">'.$registro['tweet'].'</p>';
              echo '<p class="list-group-item-text pull-right">';
                if($id_usuario == $registro['iduser']){
                  echo '<button type="button" class="btn btn-info btn_delete" data-del_usuario="'.$registro['idtweet'].'">Delete</button>';
                }
              echo '</p>';
              echo '<div class="clearfix"></div>';
        echo '</a>';
      }
    }else{
        echo 'Erro na consulta de tweets no Banco de dados';
      }
      
      
?>



