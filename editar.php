<?php
    // ini_set('upload_tmp_dir',"/var/www");

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

        <form method="POST" enctype="multipart/form-data">
        
            <?php
                echo "ID do usuário: ".$busca["id_usuario"];
            ?>

            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?=$busca["nome"]?>" required><br><br>

            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" value="<?=$busca["cpf"]?>" required><br><br>

            <label for="foto">Foto:</label>
            <div style="display: flex; flex-direction: row; align-items: center; gap: 10px;">
                <img class="foto_user" src="<?=$busca["foto"]?>">
                <input type="file" id="foto" name="foto" value="<?=$busca["foto"]?>"><br><br>
            </div>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?=$busca["email"]?>" required><br><br>
            
            <label for="senha">Senha:</label>
            <input type="password" name="senha" value="<?=$busca["senha"]?>" placeholder="Digite sua senha.">

            <label for="confsenha">Confirmar Senha:</label>
            <input type="password" name="confsenha" value="<?=$busca["senha"]?>" placeholder="Redigite sua senha.">

            <div class="botoes" enctype="multipart/form-data">
                <button class="botao confirm" type="submit" name="cadastrar">Salvar</button>    
                <a class="botao cancel" type="reset" href="./listar.php">Cancelar</a>
            </div>
            
        </form>

        <?php

        if(isset($_POST["cadastrar"]))
        {
            $nome = $_POST["nome"];
            $cpf = $_POST["cpf"];
            $arquivo = $_FILES["foto"];
            $email = $_POST["email"];
            $senha = $_POST["senha"];
            $confsenha = addslashes($_POST["confsenha"]);
            
            if(!empty($nome) && !empty($cpf) && !empty($email) && !empty($senha) && !empty($confsenha))
            {
                if($senha == $confsenha){
                                        
                    if ($arquivo != null && $arquivo['error']) {
                        die("Falha ao enviar arquivo. err_id: ". $arquivo['error']);
                    }
                    elseif($arquivo == null){
                        $arquivo = '';
                    }
                    else{
                        $pasta = './uploads/fotos/';
                    
                        $nome_arquivo = $arquivo['name'];
                        $novo_nome = uniqid();
                        $extensao = strtolower(pathinfo($nome_arquivo, PATHINFO_EXTENSION));
                        if ($extensao != "png" && $extensao != "jpg" && $extensao != "jpeg") die("Arquivo inválido");    
                        
                        $path_foto = $pasta . $novo_nome . "." . $extensao;
                
                        $foto = move_uploaded_file($arquivo['tmp_name'], $path_foto);
                        if ($foto){
                            echo "<br>Arquivo enviado com sucesso";
                        }else{
                            echo "<br>Falha ao salvar arquivo";
                        }
                    }

                    $objUser = $user;
                    $objUser->nome = $nome;
                    $objUser->cpf = $cpf;
                    $objUser->foto = $path_foto;
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