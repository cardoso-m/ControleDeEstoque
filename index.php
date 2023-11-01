<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle</title>
    <link rel="stylesheet" href="tela.css">
</head>
<body>
    <div class="sidebar">
        <img src="imagens/logo.jpeg" alt="Logo" class="logo">
        <h2>Primitiva</h2><br>
        <h2>Controle de Estoque</h2>

        <form method="post" class="logout-form">
            <input class="logout" type="submit" name="logout" value="Sair">
        </form>
    </div>

    <div class="main-content">
        <table>

        <h2>ESTOQUE:</h2>

            <tr><th>ID</th><th>Nome</th><th>Quantidade</th><th>Editar</th><th>Excluir</th></tr>
            <?php

                include_once("cnx.php");

                $con = mysqli_connect($host, $dbuser, $dbpass, $dbname);

                $query = mysqli_query($con, "SELECT * FROM produtos");
                foreach($query AS $produtos){
                    $idProduto = $produtos['id'];
                    $nomeProduto = $produtos['nome'];
                    $quantidadeProduto = $produtos['quantidade'];
                    
                    echo "<tr>";
                    echo "<td>$idProduto</td>";
                    echo "<td>$nomeProduto</td>";
                    echo "<td>$quantidadeProduto</td>";
                    echo "<td><a href='editarproduto.php?id=$idProduto'>Editar</a></td>";
                    echo "<td><a href='excluirproduto.php?id=$idProduto'>Excluir</a></td>";
                    echo "</tr>";

                }
            ?>
        </table>

        <a href="novoproduto.php" class="novo-produto">Novo Produto</a>
    </div>

</body>
</html>

<?php 

if(isset($_POST['logout'])){
    session_start();
    session_destroy();
    header('Location: login.php');
}

?>