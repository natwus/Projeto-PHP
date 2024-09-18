<?php
// Variáveis de conexão ao banco de dados
include ("conexao.php");
// Variáveis que recebem os dados do paciente do formulário
$idCliente = $_POST["id"];
$nomeCliente = $_POST["nome"];
$cpfCliente = $_POST["cpf"];
$nascimentoCliente = $_POST["data"];
$cepCliente = $_POST["cep"];
$estadoCliente = $_POST["estado"];
$cidadeCliente = $_POST["cidade"];
$enderecoCliente = $_POST["rua"];
$numeroCliente = $_POST["numero"];
$sexoCliente = $_POST["sexo"];
$telCliente = $_POST["tel"];
$emailCliente = $_POST["email"];
// Estabelece a conexão com o banco de dados MySQL usando as variáveis de conexão
$conn = mysqli_connect($servername, $username, $password, $database);
// Define a instrução SQL UPDATE que atualiza os dados do paciente na tabela "paciente"
$sql = "UPDATE cliente SET nomeCliente = '$nomeCliente', cpfCliente = '$cpfCliente', nascimentoCliente = '$nascimentoCliente', cepCliente = '$cepCliente', estadoCliente = '$estadoCliente', cidadeCliente = '$cidadeCliente', enderecoCliente = '$enderecoCliente', numeroCliente = '$numeroCliente', sexoCliente = '$sexoCliente', telCliente = '$telCliente', emailCliente = '$emailCliente' WHERE idCliente = '$idCliente'";
// Executa a instrução SQL UPDATE
if (mysqli_query($conn, $sql))

mysqli_close($conn);
?>
<!-- Redireciona o usuário para a página "consultar.php" após 0 segundos -->
<meta http-equiv="refresh" content="0; URL='consultar.php'">