<?php

require './classes/Usuario.php';
$user = new Usuario();

$usuarios = $user->buscar();
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
        <div class="titulo">Lista de Usuários</div>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($usuarios as $usuario){ 
                        echo '<tr>';
                            echo '<td>'. $usuario->nome .'</td>';
                            echo '<td>'. $usuario->cpf .'</td>';
                            echo '<td>'. $usuario->email .'</td>';
                        echo '</tr>';
                    } 
                ?>
            </tbody>
        </table>
        <button class="botao cancel" onclick="location.href='./index.php';">Voltar</button>
    </div>
</body>
</html>
