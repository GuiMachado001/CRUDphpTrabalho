<?php


class Usuario{
    public int $id_usuario;
    public string $nome;
    public string $preco;
    public string $descricao;
    public string $imagem;

    public function cadastrar(){
        $db = new Database('produto');

        $res = $db->insert(
                [
                    'nome'=> $this->nome,
                    'preco'=> $this->preco,
                    'descricao'=> $this->descricao,
                    'imagem'=> $this->imagem,
                ]
            );
        return $res;
    }

}