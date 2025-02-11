<?php
require './App/DB/Database.php';

class Produto{
    public int $id_usuario;
    public string $nome;


    public function cadastrar(){
        $db = new Database('produto');

        $res = $db->insert(
                [
                    'nome'=> $this->nome,
                ]
            );
        return $res;
    }

    public function listar() {
        $db = new Database('produto');
        $sql = "SELECT * FROM produto";
        return $db->select($sql);
    }

    public function buscar($id) {
        $db = new Database('produto');
    
        $sql = "SELECT * FROM produto WHERE id_produto = ?";
        $prod = $db->select($sql, [$id]);

        return $prod ? $prod[0] : null;
    }
    
    public function atualizar($id, $nome) {
        $db = new Database('produto');
    
        $sql = "UPDATE produto SET nome = ? WHERE id_produto = ?";
    
        return $db->update($sql, [$nome, $id]);
    }

    public function deletar($id) {
        $db = new Database('produto');
        $sql = "DELETE FROM produto WHERE id_produto = ?";
        return $db->delete($sql, [$id]);
    }
    
    
}

