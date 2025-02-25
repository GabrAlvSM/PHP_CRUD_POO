<?php
    require './classes/Usuario.php';
    
    $user = new Usuario();        
    
    // // READ
    // $busca = $user->buscar_id_usu(3);
    // print_r($busca);
    
    // print_r($_GET['id_usuario']);
    if (isset($_GET['id_usuario'])) {
        $id_usuario = addslashes($_GET['id_usuario']);
        $busca = $user->buscar_id_usu($id_usuario);

        // echo($busca["id_usuario"]);

        if (!$busca) {
            die('Usuario não encontrado.(die)');
        }
    }
    else{
        die('Usuario não encontrado.(else)');
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar e Atualizar Usuário</title>

    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="nucleo">
        <p class="titulo">Editar e Atualizar Usuário</p>

        <form method="POST">
        
            <?php
                echo "ID do usuário: ".$busca["id_usuario"];
            ?>

            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?=$busca["nome"]?>" required><br><br>

            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" value="<?=$busca["cpf"]?>" required><br><br>

            <!-- <label for="foto">Foto:</label>
            <input type="file" id="foto" name="foto" value="<?=$busca["foto"]?>" required><br><br> -->

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?=$busca["email"]?>" required><br><br>
            
            <label for="senha">Senha:</label>
            <input type="password" name="senha" value="<?=$busca["senha"]?>" placeholder="Digite sua senha.">

            <label for="confsenha">Confirmar Senha:</label>
            <input type="password" name="confsenha" value="<?=$busca["senha"]?>" placeholder="Redigite sua senha.">

            <div class="botoes">
                <button class="botao confirm" type="submit" name="cadastrar">Salvar</button>    
                <a class="botao cancel" type="reset" href="./listar.php">Cancelar</a>
            </div>
            
        </form>

        <?php

        if(isset($_POST["cadastrar"]))
        {
            $nome = $_POST["nome"];
            $cpf = $_POST["cpf"];
            $email = $_POST["email"];
            $senha = $_POST["senha"];
            $confsenha = addslashes($_POST["confsenha"]);
            
            if(!empty($nome) && !empty($cpf) && !empty($email) && !empty($senha) && !empty($confsenha))
            {
                if($senha == $confsenha){
                    
                    $objUser = $user;
                    $objUser->nome = $nome;
                    $objUser->cpf = $cpf;
                    $objUser->email = $email;
                    $objUser->senha = $senha;
                    
                    $res = $objUser->update($_GET['id_usuario']);
                    if($res){                    
                        echo  "<script>alert('Editado com sucesso!');</script>";
                        ?> 
                        <!-- <div id="msg-sucesso">
                            Editado com sucesso;
                            Clique <a href="index.php">aqui</a>
                            para logar.
                        </div> -->
                        <?php
                    }
                    else{
                        echo  "<script>alert('Nada alterado!');</script>";
                    }
                }
                else{
                    echo  "<script>alert('Senha e Confirma senha não conferem!');</script>";
                }
            }
            else{
                echo  "<script>alert('Preencha todos os campos!');</script>";
            }
        }
        ?>
    </div>
</body>
</html>