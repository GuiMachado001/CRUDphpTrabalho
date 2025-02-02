<?php


class Database{
    private $conn;
    private string $local = 'localhost';
    private string $db = 'parzivals';
    private string $user = 'root';
    private string $password = '';
    private $table;

    function __construct($table = null){
        $this->table = $table;
        $this->conecta();
    }
    
    private function conecta(){
        try{
            $this->conn = new PDO("mysql:host=".$this->local.";dbname=$this->db",$this->user,$this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Conectado com sucesso";
        }catch(PDOException $err){
            die("Connection Failed: " . $err->getMessage());
        }
    }

    public function execute($query, $binds = []){
        // echo $query;

        try{
            $stmt = $this->conn->prepare($query);
            $stmt->execute($binds);
            return $stmt;
        }catch(PDOException $err){
            die('Connection Failed'. $err->getMessage());
        }
    }
    public function insert($values){
        // quebrar o array associativo que veio como parametro
        $fields = array_keys($values);

        $binds = array_pad([], count($fields), '?');

        $query = 'INSERT INTO '.$this->table . '('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';

        $res = $this->execute($query, array_values($values));

        if($res){
            return true;
        }else{
            return false;
        }
    }
}
