<?php

// require '../App/DB/Database.php';
require "./App/DB/Database.php";

class Usuario{
    
    public int $id_usuario;
    public string $nome;
    public string $cpf;
    public string $foto;
    public string $email;
    public string $senha;
    
    // private function __construct(){
    // }
    
    public function cadastrar(): bool{
        $db = new Database("usuario");

        $db->insert(
            [
                "nome"=> $this->nome,
                "cpf"=> $this->cpf,
                "foto"=> $this->foto,
                "email"=> $this->email,
                "senha"=> $this->senha
            ]
        );
        return true;
    }

    public function buscar($where=null,$order=null,$limit=null){
        return (new Database("usuario"))->list_users($where,$order,$limit)->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public function buscar_id_usu($id_usuario){
        return (new Database("usuario"))->list_users("id_usuario =".$id_usuario)->fetch();
    }

    public function logar($email,$senha){
        $checalogin = (new Database("usuario"))->execute("SELECT id_usuario FROM usuario WHERE email = '$email' AND senha = '$senha';");
        // $checalogin->bindValue(":e", $email);
        // $checalogin->bindValue(":s", $senha);
        // $checalogin->execute();
        
        if($checalogin->rowCount()>0){
            $dados = $checalogin->fetch();
            session_start();
            $_SESSION["id_usuario"] = $dados["id_usuario"];
            return true;
        }
        else{
            return false;
        }
    }

    public function deletar($id_usuario){
        return(new Database("usuario"))->delete("id_usuario =".$id_usuario);
    }
    
    public function update($id_usuario){
        return(new Database("usuario"))->update("id_usuario =".$id_usuario,
            [
                "nome"=> $this->nome,
                "cpf"=> $this->cpf,
                "foto"=> $this->foto,
                "email"=> $this->email,
                "senha"=> $this->senha
            ]
        );
    }
}   

// $teste = new Usuario();
   
// $teste->nome = "Juliana";
// $teste->email = "juju@email.com";
// $teste->cpf = "22222222222";
// $teste->senha = "123";

// print_r($teste);

// // INSERT
// $retorno = $teste->cadastrar();

// if($retorno){
//     echo "Usuário castrado com sucesso!";
// }
// else{
//     "ERRO! Falha no cadastro do usuário";
// }

// $user = new Usuario();
// $busca = $user->buscar_id_usu(10);
// print_r($busca);
// $busca->nome = "Alvin";
// $busca->cpf = "33333333333";
// $busca->email = "alvin@email.com";
// $busca->senha = "padrao123";

// print_r($busca);

?>