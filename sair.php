<?php

    session_start();

       unset($_SESSION['usuario']); 
       unset($_SESSION['email']); 
        

       //Voltar a pág index.php quando clicar em SAIR
       if (!isset($dados_usuario['usuario'])) {
            header('location: index.php');
       }
?>