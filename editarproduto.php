<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
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
    
    <?php 

        include_once("cnx.php");

        $con = mysqli_connect($host, $dbuser, $dbpass, $dbname);

        if(isset($_GET['id'])){

            $id = $_GET['id'];

            $query = mysqli_query($con, "SELECT * FROM produtos WHERE id='$id'");

            if($row = mysqli_fetch_assoc($query)){
                $nome = $row['nome'];
                $quantidade = $row['quantidade'];
            }
        }

    ?>
    
    <form method="POST">
        <label for="">ID:<br>
        <input type="text" name="id" value="<?php echo $id; ?>" readonly></label><br>
        <label for="">Nome:<br>
        <input type="text" name="nome" value="<?php echo $nome; ?>"></label><br>
        <label for="">Quantidade:<br>
        <input type="text" name="quantidade" value="<?php echo $quantidade; ?>"></label><br>

        <br><br>

        <input type="submit" class="input" name="editar" value="Editar Produto">
    </form>

</body>
</html>

<?php 

    include_once("cnx.php");

    $con = mysqli_connect($host, $dbuser, $dbpass, $dbname);

    if(isset($_POST['editar'])){

        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $quantidade = $_POST['quantidade'];

        $query = mysqli_query($con, "UPDATE produtos SET nome='$nome', quantidade='$quantidade' WHERE id='$id'");

        if($query){
            header('Location: index.php');
            exit;
        }else{
            echo "Falhou ao editar o produto";
        }
    }

?>