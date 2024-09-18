<?php
// Variáveis de conexão ao banco de dados
include ("conexao.php");
// Variáveis que recebem os dados do paciente do formulário
$idProduto = $_POST["idProduto"];
$nomeProduto = $_POST["nomeProduto"];
$avaliaçãoProduto = $_POST["avaliaçãoProduto"];
$statusProduto = $_POST["statusProduto"];
$anoFabricacao = $_POST["anoFabricacao"];
$dimensoesProduto = $_POST["dimensoesProduto"];
$pesoProduto = $_POST["pesoProduto"];
$idFornecedor = $_POST["idFornecedor"];
$idGrupo = $_POST["idGrupo"];
// Estabelece a conexão com o banco de dados MySQL usando as variáveis de conexão
$conn = mysqli_connect($servername, $username, $password, $database);
// Define a instrução SQL UPDATE que atualiza os dados do paciente na tabela "paciente"
$sql = "UPDATE produto SET nomeProduto = '$nomeProduto', avaliaçãoProduto = '$avaliaçãoProduto', statusProduto = '$statusProduto', anoFabricacao = '$anoFabricacao', dimensoesProduto = '$dimensoesProduto', pesoProduto = '$pesoProduto', idFornecedor = '$idFornecedor', idGrupo = '$idGrupo' WHERE idProduto = '$idProduto'";
// Executa a instrução SQL UPDATE
if (mysqli_query($conn, $sql))
    // Fecha a conexão com o banco de dados MySQL
    mysqli_close($conn);
?>
<!-- Redireciona o usuário para a página "consultar.php" após 0 segundos -->
<meta http-equiv="refresh" content="0; URL='consultar.php'">