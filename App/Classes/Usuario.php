<?php
require '../DB/Database.php';

class Usuario{
    // public int $id_usuario;
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

    public function buscar($where=null, $order=null, $limit=null){
        $db = new Database('usuario');

        $res = $db->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS,self::class);
        return $res;
    }

    public function buscar_por_id($id){
        $db = new Database('usuario');

        $obj = $db->select('id_usuario ='.$id)->fetchObject(self::class);
        return $obj; //retorna um obj da classe usuario
    }

    public function atualizar(){
        $db = new Database('usuario');

        $res = $db->update("id_usuario =".$this->id_usuario,
                            [
                                "nome" => $this->nome,
                                "email" => $this->email,
                                "senha" => $this->senha,
                            ]
                        );

        return $res;
    }

    public function excluir(){
        $db = new Database('usuario');

        $res = $db->delete('id_usuario ='.$this->id_usuario);
        return $res;
    }
}
