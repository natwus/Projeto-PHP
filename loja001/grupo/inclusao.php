<?php
// Recebe o conteudo da variavel através do método POST
$nomeGrupo = $_POST["nomeGrupo"];
$descricaoGrupo = $_POST["descricaoGrupo"];
$idCategoria = $_POST["idCategoria"];
// Inclui um arquivo PHP chamado "conexao.php" que contém as informações de conexão ao banco de dados MySQL
include ("conexao.php");
// Define a instrução SQL INSERT que insere os valores das variáveis $nome, $medico, $sus e $hora na tabela "paciente" do banco de dados
$sql = "INSERT INTO grupo (nomeGrupo, descricaoGrupo, idCategoria) VALUES('$nomeGrupo', '$descricaoGrupo', '$idCategoria')";
// Executa a instrução SQL INSERT e verifica se a operação foi bem-sucedida
if (mysqli_query($conn, $sql)) {
  // Exibe a mensagem "Registro Gravado Com Sucesso!" e um botão para consultar os dados
} else {
  // Exibe a mensagem de erro "Error!" e detalhes do erro
  echo "<br>Error:!" . $sql . "<br>" . mysqli_error($conn);
}
// Fecha a conexão com o banco de dados MySQL
mysqli_close($conn);
?>
<meta http-equiv="refresh" content="0; URL='consultar.php'">