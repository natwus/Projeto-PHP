<?php
$idTabelaprecos = $_POST["idTabelaprecos"];
// Inclui o arquivo "conexao.php" que contém as informações de conexão ao banco de dados MySQL
include("conexao.php");
// Verifica se o ID do paciente foi enviado pelo formulário (evita erros)
if(isset($_POST["idTabelaprecos"])){
  // Define a instrução SQL DELETE que remove o paciente da tabela "paciente"
  $sql = "DELETE FROM tabelaprecos WHERE idTabelaprecos = $idTabelaprecos";
  // Executa a instrução SQL DELETE
  $resultado = mysqli_query($conn, $sql) or die ("erro");
}
mysqli_close($conn);
?>
<!-- Redireciona o usuário para a página "consultar.php" após 0 segundos -->
<meta http-equiv="refresh" content="0; URL='consultar.php'">
