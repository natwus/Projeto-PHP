<?php
// **1. Variáveis de conexão:**
$servername = "localhost";
$database = "loja001";
$username = "root";
$password = "";
// **2. Conexão ao banco de dados:**
$conn = mysqli_connect($servername, $username, $password, $database);
// **3. Verificação de conexão:**
if (!$conn) {
  die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}