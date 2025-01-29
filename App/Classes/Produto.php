<?php

class Produto{
    public int $id_usuario;
    public string $nome;
    public string $preco;

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
}