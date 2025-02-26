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
                        <th>Foto</th>
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
                            // imagem do usuario
                                echo '<td>'. $usuario->id_usuario .'</td>';
                                ?> <td class="foto_col"> <img class="foto_user" src="<?=$usuario->foto?>"> </td><?php
                                echo '<td>'. $usuario->nome .'</td>';
                                echo '<td>'. $usuario->cpf .'</td>';
                                echo '<td>'. $usuario->email .'</td>';
                                ?>
                                <td class="botoes-tabela">
                                    <a class="botao editar" href="editar.php?id_usuario=<?=htmlspecialchars($usuario->id_usuario); ?>">Editar</a>
                                    <button class="botao deletar" type="submit" name="deletar" value="<?=$usuario->id_usuario?>" onclick="javascript:return confirm('Confirme para excluir este usuário.')">Deletar</button>
                                </td>
                                <?php
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