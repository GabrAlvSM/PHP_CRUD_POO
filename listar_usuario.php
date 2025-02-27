<?php

require './classes/Produto.php';
$user = new Produto();

// ACAO LISTAR
$usuarios = $user->listar_prod();
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
    <title>Usuarios</title>

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
                        <th>Descricao</th>
                        <th>Categoria</th>
                        <th>Estoque</th>
                        <th>Opções</th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach($produtos as $produto){
                            echo '<tr>';
                            // imagem do usuario
                                echo '<td>'. $produto->id_prod .'</td>';
                                ?> <td class="foto_col"> <img class="foto_user" src="<?=$produto->foto?>"> </td><?php
                                echo '<td>'. $produto->nome .'</td>';
                                echo '<td>'. $produto->cpf .'</td>';
                                echo '<td>'. $produto->email .'</td>';
                                ?>
                                <td class="botoes-tabela">
                                    <a class="botao editar" href="editar.php?id_prod=<?=htmlspecialchars($produto->id_prod); ?>">Editar</a>
                                    <button class="botao deletar" type="submit" name="deletar" value="<?=$produto->id_prod?>" onclick="javascript:return confirm('Confirme para excluir este usuário.')">Deletar</button>
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