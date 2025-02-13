<?php
    require './classes/Usuario.php';
    // require_once './listar.php';
    
    $user = new Usuario();
        
    // // READ

    // $busca = $user->buscar_id_usu(10);
    // print_r($busca);
    // $busca->nome = "Alvin";
    // $busca->cpf = "33333333333";
    // $busca->email = "alvin@email.com";
    // $busca->senha = "padrao123";

    // print_r($busca);

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

        <?php
            // print_r($_GET['id_usuario']);

            if (isset($_GET['id_usuario'])) {
                $id_usuario = addslashes($_GET['id_usuario']);
                // $busca = $user->buscar_id_usu($id_usuario);
                $busca = $user->buscar($id_usuario);

                print_r($busca[1]);

                if (!$busca) {
                    die('Usuario não encontrado.');
                }
            }
            else{
                die('Usuario não encontrado.');
            }
            
        ?>

        <form action="editar.php?id_produto=<?php echo $id_usuario?>" method="POST">
        
            <?php
                // echo "ID do usuário: ".$busca->id_usuario;
            ?>

            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="" required><br><br>

            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" value="" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="" required><br><br>
            
            <label for="senha">Senha:</label>
            <input type="password" name="senha" value="" placeholder="Digite sua senha.">

            <label for="confsenha">Senha:</label>
            <input type="password" name="confsenha" value="" placeholder="Redigite sua senha.">

            <button type="submit">Salvar alterações</button>
            
            <a href="./listar.php">VOLTAR</a>
            
        </form>

        <?php

        if(isset($_POST["nome"]))
        {
            $nome = $_POST["nome"];
            $cpf = $_POST["cpf"];
            $email = $_POST["email"];
            $senha = $_POST["senha"];
            $confsenha = addslashes($_POST["confsenha"]);

            if(!empty($nome) && !empty($cpf) && !empty($email) && !empty($senha) && !empty($confsenha))
            {
                if($senha == $confsenha){

                    if($usuario->cadastrar($nome, $telefone, $email, $senha)){                    
                        ?> 
                        <!-- Inicio da area do html -->
                        <div id="msg-sucesso">
                            Cadastrado com sucesso;
                            Clique <a href="index.php">aqui</a>
                            para logar.
                        </div>
                        <!-- Fim da area do html -->
                        <?php
                    }
                    else{
                        ?>
                        <!-- Inicio da area do html -->
                        <div id="msg-sucesso">
                            Email já cadastrado
                        </div>
                        <!-- Fim da area do html -->                        
                        <?php
                    }
                }
                else{
                    ?>
                    <div id="msg-sucesso">
                        Senha e Confirma senha não conferem.
                    </div>
                    <?php
                }
            }
            else{
                ?>
                <!-- Inicio da area do html -->
                    <div id="msg-sucesso">
                        Preencha todos os campos.
                    </div>
                <!-- Fim da area do html -->                        
                <?php
            }
        }
        ?>
    </div>
</body>
</html>