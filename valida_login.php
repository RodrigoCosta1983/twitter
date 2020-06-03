<?php

    $login_usuario = $_POST['login'];    
    $senha_usuario = $_POST['senha'];

    function valida_login($login, $senha){

        $login_bd = 'rodrigo.costa';
        $senha_bd = 12345;

        if ($login == $login_bd && $senha == $senha_bd) {
            return true;
        }

        return false;
    }

    $usuario_validado = valida_login($login_usuario, $senha_usuario);

        if ($usuario_validado) {
            echo ('Pronto!!!');
            
        }else {
            echo('Nada!!!');
        }

        



?>

