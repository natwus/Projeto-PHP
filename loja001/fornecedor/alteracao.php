<?php
// Variáveis de conexão ao banco de dados
include("conexao.php");
// Variáveis que recebem os dados do paciente do formulário
$idFornecedor = $_POST["idFornecedor"];
$nomeFornecedor = $_POST["nomeFornecedor"];
$estadoFornecedor = $_POST["estadoFornecedor"];
$cidadeFornecedor = $_POST["cidadeFornecedor"];
$enderecoFornecedor = $_POST["enderecoFornecedor"];
$cnpjFornecedor = $_POST["cnpjFornecedor"];
$statusFornecedor = $_POST["statusFornecedor"];
$emailFornecedor = $_POST["emailFornecedor"];
$telFornecedor = $_POST["telFornecedor"];
$cepFornecedor = $_POST["cepFornecedor"];
// Estabelece a conexão com o banco de dados MySQL usando as variáveis de conexão
$conn = mysqli_connect($servername, $username, $password, $database);
// Define a instrução SQL UPDATE que atualiza os dados do paciente na tabela "paciente"
$sql = "UPDATE fornecedor SET nomeFornecedor = '$nomeFornecedor', estadoFornecedor = '$estadoFornecedor', cidadeFornecedor = '$cidadeFornecedor', enderecoFornecedor = '$enderecoFornecedor',cnpjFornecedor = '$cnpjFornecedor', statusFornecedor = '$statusFornecedor', emailFornecedor = '$emailFornecedor',telFornecedor = '$telFornecedor', cepFornecedor = '$cepFornecedor' WHERE idFornecedor = '$idFornecedor';";
// Executa a instrução SQL UPDATE
if (mysqli_query($conn, $sql))
// Fecha a conexão com o banco de dados MySQL
mysqli_close($conn);
?>
<!-- Redireciona o usuário para a página "consultar.php" após 0 segundos -->
<meta http-equiv="refresh" content="0; URL='consultar.php'">