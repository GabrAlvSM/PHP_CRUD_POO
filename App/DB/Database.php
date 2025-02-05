<?php

class Database{
    private $conn;
    private string $local = "localhost";
    private string $banco = "crud_testes";
    private string $user = "devweb";
    private string $password = "suporte@22";
    private $table;
    
    function __construct($table = null) {
        $this->conecta();
        $this->table = $table;
    }

    public function conecta() {
        try{
            $this->conn = new PDO("mysql:host=$this->local; dbname=$this->banco;", $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            echo "Conectado!"; //DEBUG
        }
        catch(PDOException $erro){
            die("\nFalha na conecção! (fn conn) <br>". $erro->getMessage());
        }
    }

    public function execute($query, $binds = []){
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->execute($binds);
            return $stmt;
        }
        catch(PDOException $erro){
            print_r($query);
            die("\nFalha na conecção! (fn exec) <br>". $erro->getMessage());
        }
    }

    public function insert($values){
        $fields = array_keys($values);
        $binds = array_pad([],count($fields),"?");
        $query = "INSERT INTO ". $this->table . "(".implode(",", $fields).") VALUES (".implode(",",$binds).")";

        $out = $this->execute($query,array_values($values));

        if($out){
            echo "Cadastrado com sucesso!";
        }
        else{
            echo "Falha na execução, usuário não cadastrado!";
        }
    }

    public function select($where = null, $order = null, $limit = null, $fields = "*"){
        $where = strlen($where) ? "WHERE ".$where : "";
        $order = strlen($order) ? "ORDER BY".$order : "";
        $limit = strlen($limit) ? "LIMIT ".$limit : "";

        $query = "SELECT $fields FROM $this->table $where $order $limit";

        return $this->execute($query)->fetch(PDO::FETCH_ASSOC);
    }

    public function list_users($where = null, $order = null, $limit = null, $fields = "*"){
        $where = strlen($where) ? "WHERE ".$where : "";
        $order = strlen($order) ? "ORDER BY".$order : "";
        $limit = strlen($limit) ? "LIMIT ".$limit : "";

        $query = "SELECT $fields FROM $this->table $where $order $limit";

        return $this->execute($query);
    }

    public function update($where, $array){
        $fields = array_keys($array);
        $values = array_values($array);

        $query = "UPDATE $this->table SET ".implode('=?,',$fields)."=? WHERE $where";

        $res = $this->execute($query, $values);
        return $res->rowCount();
    }

    public function delete($where){
        $query = "DELETE FROM $this->table WHERE $where";

        $del = $this->execute($query);
        $del = $del->rowCount();

        if($del==1){
            return true;
        }
        else{
            return false;
        }
    }
}
?>