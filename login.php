<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
    <style>
        .error-message {
            color: red;
        }
    </style>
</head>
<body>
    
    <div class="login-form">
        <form method="POST">
            <label for="">E-mail:<br>
            <input type="email" name="email"></label><br>
            <label for="">Senha:<br>
            <input type="password" name="senha"></label><br>

            <br>

            <input class="input" type="submit" name="login" value="Login">
            <br>
            <a href="cadastro.php">Cadastre-se</a>

            <!-- Adicione este elemento para exibir as mensagens de erro -->
            <div id="error-message" class="error-message"></div>

        </form>
    </div>

</body>
</html>


<?php 

    include_once("cnx.php");

    $con = mysqli_connect($host, $dbuser, $dbpass, $dbname);

    if(isset($_POST['login'])){

        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND senha='$senha'");

        if(mysqli_num_rows($query) > 0){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            header('Location: index.php');
            exit;
        }else{
            echo "<script>document.getElementById('error-message').innerText = 'E-mail ou senha inválidos';</script>";
        }
    }

?>