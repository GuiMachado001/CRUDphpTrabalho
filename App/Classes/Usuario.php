<?php
require './App/DB/Database.php';

class Usuario{
    public int $id_usuario;
    public string $nome;
    public string $email;
    public string $senha;

    public function cadastrar(){
        $db = new Database('usuario');

        $res = $db->insert(
                [
                    'nome'=> $this->nome,
                    'email'=> $this->email,
                    'senha'=> $this->senha,
                ]
            );
        return $res;
    }

    public function logar($email, $senha){
        $db = new Database('usuario');

        $res = $db->login($email, $senha);
        return $res;
    }
    

}

$db = new Database('usuario');