<?php 

    include_once("cnx.php");

    $con = mysqli_connect($host, $dbuser, $dbpass, $dbname);

    if(isset($_GET['id'])){

        $id = $_GET['id'];

        $query = mysqli_query($con, "DELETE FROM produtos WHERE id='$id'");

        if($query){
            header('Location: index.php');
            exit;
        }else{
            echo "Falhou ao excluir o produto";
        }
    }

?>