<?php

    session_start();

       unset($_SESSION['usuario']); 
       unset($_SESSION['email']); 
        

       
       if (!isset($dados_usuario['usuario'])) {
            header('location: index.php');
       }
?>