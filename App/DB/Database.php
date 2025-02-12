<?php

Class Database{
    private $conn;
    private string $local = '10.28.2.105';
    private string $db = 'parzivals';
    private string $user = 'devweb';
    private string $password = 'suporte@22';
    private $table;

    function __construct($table = null){
        $this->table = $table;
        $this->conecta();

    }

    private function conecta(){
        try{
            $this->conn = new PDO("mysql:host=".$this->local.";dbname=$this->db",$this->user,$this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Conectado com sucesso";
        }catch(PDOException $err){
            die("Connection Failed". $err->getMessage());
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

    public function login($email, $senha){
    
        // Preparar a consulta SQL
        $verificar = $this->conn->prepare("SELECT id_usuario, senha FROM usuario WHERE email = :e");
        $verificar->bindValue(":e", $email);
        $verificar->execute();
        
        // Verificar se o email existe
        if ($verificar->rowCount() > 0) {
            $dados = $verificar->fetch();
    
            // Verificar se a senha fornecida corresponde à senha armazenada (com hash)
            if (password_verify($senha, $dados['senha'])) {
                // Iniciar sessão
                session_start();
                $_SESSION['id_usuario'] = $dados['id_usuario'];
                return true;
            }
        }
    
        // Caso não encontre o usuário ou a senha não seja válida
        return false;
    }

    public function select($sql, $params = []) {
        // Corrigido o uso de $this->conn em vez de $this->pdo
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($sql, $params = []) {
        $stmt = $this->conn->prepare($sql); // Alterado de $this->table para $this->conn
        return $stmt->execute($params);
    }
    
    public function delete($sql, $params = []) {
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($params);
    }

    public function logar($email, $senha){
        $db = new Database('usuario');

        $res = $db->login($email, $senha);
        return $res;
    }
    
}