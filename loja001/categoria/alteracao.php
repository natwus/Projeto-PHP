<?php
// Variáveis de conexão ao banco de dados
include ("conexao.php");
// Variáveis que recebem os dados do paciente do formulário
$idCategoria = $_POST["id"];
$nomeCategoria = $_POST["nome"];
$descricaoCategoria = $_POST["descricao"];
// Estabelece a conexão com o banco de dados MySQL usando as variáveis de conexão
$conn = mysqli_connect($servername, $username, $password, $database);
// Define a instrução SQL UPDATE que atualiza os dados do paciente na tabela "paciente"
$sql = "UPDATE categoria SET nomeCategoria = '$nomeCategoria', descricaoCategoria = '$descricaoCategoria' WHERE idCategoria = '$idCategoria'";
// Executa a instrução SQL UPDATE
if (mysqli_query($conn, $sql))
mysqli_close($conn);
?>
<!-- Redireciona o usuário para a página "consultar.php" após 0 segundos -->
<meta http-equiv="refresh" content="0; URL='consultar.php'">