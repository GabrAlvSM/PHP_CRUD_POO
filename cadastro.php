<?php

require './classes/Usuario.php';


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de usuario</title>

    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="nucleo">
        <div class="titulo">Cadastro</div>
        <form method="POST">
            <div class="separador">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" placeholder="Nome do usuario">
            </div>
            <div class="separador">
                <label for="CPF">CPF</label>
                <input type="text" name="cpf" id="cpf" placeholder="Sem pontos ou traços">
            </div>
            <div class="separador">
                <label for="Email">Email</label>
                <input type="email" name="email" id="email" placeholder="exemplo@email.com">
            </div>
            <div class="separador">
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" placeholder="Senha">
            </div>
            <div class="area-botoes" method="POST">
                <button class="botao confirm" type="submit" name="cadastrar">Cadastrar</button>
                <button class="botao cancel" type="reset" onclick="location.href='./index.php';">Voltar</button>
            </div>
        </form>
    </div>
    
</body>
</html>

<?php
if(isset($_POST["cadastrar"])) {
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $objUser = new Usuario();
    $objUser->nome = $nome;
    $objUser->cpf = $cpf;
    $objUser->email = $email;
    $objUser->senha = $senha;

    $res = $objUser->cadastrar();
    if ($res) {
        echo "<script> alert('Cadastrado com sucesso!') </script>";
    }else{
        echo "<script> alert('Erro no cadastro!') </script>";
    }
}
else{
    echo "Dados não recebidos!";
}
?>
