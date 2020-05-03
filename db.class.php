<?php

class db{

    //Qual o Host
    private $host = 'localhost';

    //Qual o Usuário
    private $usuario = 'root';

    //Qual o Senha
    private $senha = '';
    
    //Banco de Dados
    private $database = 'twitter';

    public function conecta_mysql(){

        //criar a conexao -> localizaçao do Bd, usuario de acesso, senha, banco de dados
        $con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);

        mysqli_set_charset($con, 'Utf8');

        //Verificando se houve algum erro na conexao
        if (mysqli_connect_errno()){
            echo 'Erro ao tentar conectar com o BD MySQL: '.mysqli_connect_error();
        
        }

        return $con;
    }

}

?>