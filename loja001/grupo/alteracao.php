<?php

include("conexao.php");

$idGrupo = $_POST['idGrupo'];
$nomeGrupo = $_POST['nomeGrupo'];
$descricaoGrupo = $_POST['descricaoGrupo'];      
$idCategoria = $_POST['idCategoria'];

$sql = "UPDATE grupo set nomeGrupo ='$nomeGrupo', descricaoGrupo = '$descricaoGrupo',idCategoria='$idCategoria' WHERE idGrupo='$idGrupo'";

if (mysqli_query($conn, $sql)) {
    echo "<br>Registro Gravado com Sucesso";
 } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
 }

mysqli_query($conn, $sql) or die("DEU RUIM");

mysqli_close($conn);
?>
<meta http-equiv="refresh" content="0; URL='consultar.php'"/>