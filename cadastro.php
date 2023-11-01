<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro</title>
    <style>
        .error-message {
            color: red;
        }
    </style>
</head>
<body>
    
    <form method="POST">
        <label for="">Nome:<br>
        <input type="text" name="nome"></label><br>
        <label for="">CPF:<br>
        <input type="text" name="cpf"></label><br>
        <label for="">E-mail:<br>
        <input type="email" name="email"></label><br>
        <label for="">Senha:<br>
        <input type="password" name="senha"></label><br>

        <br>

        <input class="input" type="submit" name="cadastrar" value="Cadastrar">
        <br>
        <a href="login.php">Fazer login</a>

        <div id="error-message" class="error-message"></div>
        
    </form>

</body>
</html>


<?php 

    include_once("cnx.php");

    $con = mysqli_connect($host, $dbuser, $dbpass, $dbname);

    if(isset($_POST['cadastrar'])){

        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // Validação de CPF
        if (!preg_match("/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}$/", $cpf)) {
            echo "<script>document.getElementById('error-message').innerText = 'CPF inválido';</script>";
            return;
        }

        // Validação de e-mail
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>document.getElementById('error-message').innerText = 'E-mail inválido';</script>";
            return;
        }

        // Verificação de e-mail duplicado
        $checkEmail = mysqli_query($con, "SELECT email FROM users WHERE email='$email'");
        if(mysqli_num_rows($checkEmail) > 0){
            echo "<script>document.getElementById('error-message').innerText = 'E-mail já está em uso';</script>";
            return;
        }

        // Validação de senha
        if (strlen($senha) < 8) {
            echo "<script>document.getElementById('error-message').innerText = 'A senha deve ter no mínimo 8 caracteres';</script>";
            return;
        }

        $query = mysqli_query($con, "INSERT INTO users (nome, cpf, email, senha) VALUES ('$nome', '$cpf', '$email', '$senha')");

        if($query){
        }else{
            echo "<script>document.getElementById('error-message').innerText = 'Falhou';</script>";
            return;
        }
    }

?>