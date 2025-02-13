<?php

require './classes/Usuario.php';
$user = new Usuario();

// ACAO LISTAR
$usuarios = $user->buscar();

// ACAO DELETAR
if(isset($_POST['deletar'])){
    $delete = $_POST['deletar'];
    $user->deletar($delete);
    header("Location: listar.php");
    exit;
}
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
        <form action="" method="POST">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Email</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach($usuarios as $usuario){
                            echo '<tr>';
                                echo '<td>'. $usuario->id_usuario .'</td>';
                                echo '<td>'. $usuario->nome .'</td>';
                                echo '<td>'. $usuario->cpf .'</td>';
                                echo '<td>'. $usuario->email .'</td>';
                                echo '<td>';
                                    ?>
                                    <a class="botao editar" href="editar.php?id_usuario=<?=htmlspecialchars($usuario->id_usuario); ?>" style='text-decoration: none; color: #000000; height: 100%; width: 100%;'>Editar</a>
                                    <button class="botao deletar" type="submit" name="deletar" value="'.$usuario->id_usuario.'" onclick="javascript:return confirm('Confirme para excluir este usuário.')" style="cursor:pointer;">Deletar</button>
                                    <?php
                                echo '</td>';
                            echo '</tr>';
                        };
                    ?>
                </tbody>
            </table>
        </form>
        <button class="botao cancel" onclick="location.href='./index.php';">Voltar</button>
    </div>
</body>
</html>