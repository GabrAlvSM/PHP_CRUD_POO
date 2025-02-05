<?php

require './classes/Usuario.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="nucleo">
        <form method="POST">
            <div class="titulo">Login</div>
            <div class="separador">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="exemplo@email.com">
            </div>
            <div class="separador">
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" placeholder="Senha">
            </div>
            <button class="botao confirm" type="submit" name="cadastrar">Acessar</button>
        </form>
        <a class="navegar" href="./cadastro.php">Cadastrar</a>
    </div>
</body>
</html>

<?php

if(isset($_POST['email']))
{
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    if(!empty($email) && !empty($senha))
    {
        $busca = new Usuario();
        if($busca)
        {
            if($busca->logar($email, $senha))
            {
                header("location: ./listar.php");
            }else{
                echo "<script> alert('Dados incorretos!') </script>";
            }
        }
    }else{
        echo "<script> alert('Preencha todos os campos!') </script>";
    }
}
?>