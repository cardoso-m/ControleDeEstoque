<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Produto</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #666666;
            font-family: Arial, Helvetica, sans-serif;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: black;
            padding: 20px;
            border-radius: 10px;
        }
        label {
            color: white;
        }
        input {
            background-color: black;
            color: white;
            margin-bottom: 10px;
        }
        .input{
            cursor: pointer;
        }
    </style>
</head>
<body>
    
    <form method="POST">
        <label for="">ID:<br>
        <input type="text" name="id"></label><br>
        <label for="">Nome:<br>
        <input type="text" name="nome"></label><br>
        <label for="">Quantidade:<br>
        <input type="text" name="quantidade"></label><br>

        <br><br>

        <input class="input" type="submit" name="adicionar" value="Adicionar Produto">
    </form>

</body>
</html>

<?php 

    include_once("cnx.php");

    $con = mysqli_connect($host, $dbuser, $dbpass, $dbname);

    if(isset($_POST['adicionar'])){

        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $quantidade = $_POST['quantidade'];

        $query = mysqli_query($con, "INSERT INTO produtos (id, nome, quantidade) VALUES ('$id', '$nome', '$quantidade')");

        if($query){
            header('Location: index.php');
            exit;
        }else{
            echo "Falhou ao adicionar o produto";
        }
    }

?>