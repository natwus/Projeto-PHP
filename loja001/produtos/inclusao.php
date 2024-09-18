<?php
// Recebe o conteudo da variavel através do método POST
$nome = $_POST["nome"];
$avaliacao = $_POST["avaliacao"];
$status = $_POST["status"];
$anoFabricacao = $_POST["anoFabricacao"];
$dimensoes = $_POST["dimensoes"];
$peso = $_POST["peso"];
$fornecedor = $_POST["fornecedor"];
$grupo = $_POST["grupo"];
// Inclui um arquivo PHP chamado "conexao.php" que contém as informações de conexão ao banco de dados MySQL
include ("conexao.php");
// Define a instrução SQL INSERT que insere os valores das variáveis $nome, $medico, $sus e $hora na tabela "paciente" do banco de dados
$sql = "INSERT INTO produto (nomeProduto, avaliaçãoProduto, statusProduto, anoFabricacao, dimensoesProduto, pesoProduto, idFornecedor, idGrupo) VALUES('$nome', '$avaliacao', '$status', '$anoFabricacao', '$dimensoes', '$peso', '$fornecedor', '$grupo')";
// Executa a instrução SQL INSERT e verifica se a operação foi bem-sucedida
if(mysqli_query($conn, $sql)){
  // Exibe a mensagem "Registro Gravado Com Sucesso!" e um botão para consultar os dados
} else {
  // Exibe a mensagem de erro "Error!" e detalhes do erro
  echo "<br>Error:!" . $sql . "<br>" . mysqli_error($conn);
}
// Fecha a conexão com o banco de dados MySQL
mysqli_close($conn);
?>
<meta http-equiv="refresh" content="0; URL='consultar.php'">