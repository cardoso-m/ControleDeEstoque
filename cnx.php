<?php 

    $host = 'localhost';
    $dbname = 'controle_de_estoque';
    $dbuser = 'root';
    $dbpass = '';

    $mysqli = new mysqli($host, $dbuser, $dbpass, $dbname);

    if ($mysqli->connect_error) {
        echo "Erro!";
    }
    else{
    }

?>