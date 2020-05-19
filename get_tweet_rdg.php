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
  $sql = " SELECT date_format(tweet.data_inclusao, '%d %b %Y %T') as data_hora, usuarios.usuario, tweet.tweet, data_inclusao FROM tweet left outer join usuarios on usuarios.id = tweet.id_usuario where id_usuario = $id_usuario ORDER BY tweet.data_inclusao DESC ";

  //executa a query de conexão com bd
  $resultado_id = mysqli_query($link, $sql);
    
    if($resultado_id){
        $dados_tweets = array();

      while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
        $tweets_usuario[] = $registro;

      }foreach($tweets_usuario as $tweets){
        // var_dump($tweets['tweet']);
        echo '<b>'.ucfirst($tweets['usuario']).'</b>', '<br />', $tweets['tweet'], '<br />', $tweets['data_hora'];
        echo '<br /><br />';
       }

    }else{
        echo 'Erro na consulta de tweets no Banco de dados';
      }

?>