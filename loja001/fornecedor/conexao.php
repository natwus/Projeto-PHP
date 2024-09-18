<?php
$servername = "localhost";
$database = "loja001";
$username = "root";
$password = "";



$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn){
    die("Falha na conexão". mysqli_connect_error());
}
