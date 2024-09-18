<?php

include("conexao.php");

$idTabelaprecos = $_POST['idTabelaprecos'];
$valorProduto = $_POST['valorProduto'];    
$idProduto = $_POST['idProduto'];

$sql = "UPDATE tabelaprecos set valorProduto ='$valorProduto',idProduto = '$idProduto' WHERE idTabelaprecos= '$idTabelaprecos'";

if(mysqli_query($conn, $sql)) {
    echo "<br>Registro Gravado com Sucesso";
 } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
 }

mysqli_query($conn, $sql) or die("DEU RUIM");
 
mysqli_close($conn);
?>
<meta http-equiv="refresh" content="0; URL='consultar.php'"/>