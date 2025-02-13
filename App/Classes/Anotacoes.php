<?php
require './App/DB/Database.php';

class Anotacoes{
    public int $id_anotacoes;
    public string $title;
    public string $descricao;

    public function cadastrar(){
        $db = new Database('anotacoes');

        $res = $db->insert(
            [
                'title' => $this->title,
                'descricao' => $this->descricao,
            ]
            );
        return $res;
    }

    public function listar(){
        $db = new Database('anotacoes');
        $sql = "SELECT * FROM anotacoes";
        return $db->select($sql);
    }

    public function buscar($id){
        $db = new Database('anotacoes');

        $sql = "SELECT * FROM anotacoes WHERE id_anotacoes = ?";
        $prod = $db->select($sql, [$id]);

        return $prod ? $prod[0] : null;
    }

    public function atualizar($id, $title, $descricao) {
        $db = new Database('anotacoes');
    
        // Corrigindo a vírgula entre $descricao e $id
        $sql = "UPDATE anotacoes SET title = ?, descricao = ? WHERE id_anotacoes = ?";
    
        return $db->update($sql, [$title, $descricao, $id]);  // Adicionando $id no array
    }
    

    public function deletar($id) {
        $db = new Database('anotacoes');
        $sql = "DELETE FROM anotacoes WHERE id_anotacoes = ?";
        return $db->delete($sql, [$id]);
    }
    
}