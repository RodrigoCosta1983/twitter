<?php


    require_once('db.class.php');
    
    $sql = " SELECT * FROM usuarios ";
        //$sql = " SELECT * FROM usuarios where senha= md5('123456') "; --- apenas usuários com senha=123456
    
    $objDb = new db();
    $link = $objDb->conecta_mysql();

    //executando a consulta
    $resultado_id = mysqli_query($link, $sql);

    if ($resultado_id) {
            $dados_usuario = array();

        while ($linha = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){ 
            $dados_usuario[] = $linha;
        }
            foreach($dados_usuario as $usuario){
              //  var_dump($usuario['usuario'],$usuario['email']);
              //  echo '<br/><br/>';
                echo "ID = ",$usuario['id']," // ","Usuário = ", $usuario['usuario'] ," // E-mail = ", $usuario['email'];
                echo '<br/><br/>';
            }
    }else {
        echo 'Erro na execução da consulta, favor entrar em contato com o Admin do site';
    }
    
?>