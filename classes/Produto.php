<?php

// require '../App/DB/Database.php';
require "./App/DB/Database.php";

class Produto{
    
    public int $id_prod;
    public string $foto;
    public string $nome;
    public string $descricao;
    public string $categoria;
    public string $estoque;
    
    // private function __construct(){
    // }
    
    public function cadastrar(){
        // $db = new Database("produto");

        // $db->insert(
        //     [
        //         "foto"=> $this->foto,
        //         "nome"=> $this->nome,
        //         "descricao"=> $this->descricao,
        //         "categoria"=> $this->categoria,
        //         "estoque"=> $this->estoque
        //     ]
        // );
        // return true;

        
        return (new Database("produto"))->insert(["foto"=> $this->foto,"nome"=> $this->nome,"descricao"=> $this->descricao,"categoria"=> $this->categoria,"estoque"=> $this->estoque]);
        //  true;
    }

    public function listar_prod($where=null,$order=null,$limit=null){
        return (new Database("produto"))->list_users($where,$order,$limit)->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public function buscar_id_prod($id_prod){
        return (new Database("produto"))->list_users("id_prod =".$id_prod)->fetch();
    }

    public function deletar($id_prod){
        return(new Database("produto"))->delete("id_prod =".$id_prod);
    }
    
    public function update($id_prod){
        return(new Database("produto"))->update("id_prod =".$id_prod,
            [
                "foto"=> $this->foto,
                "nome"=> $this->nome,
                "descricao"=> $this->descricao,
                "categoria"=> $this->categoria,
                "estoque"=> $this->estoque
            ]
        );
    }
}   

?>