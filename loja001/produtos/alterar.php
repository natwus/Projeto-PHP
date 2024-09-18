<style>
  * {
    margin: 0;
  }

  body {
    font-family: Arial, sans-serif;
    background-color: #ccc;
  }

  header {
    background-color: #333;
    color: #ccc;
    padding: 30px 20px;
    text-align: center;
  }

  main {
    display: flex;
    justify-content: center;
    padding-top: 60px;
  }

  .inputs {
    background-color: #333;
    display: flex;
    flex-direction: column;
    width: 280px;
    align-items: center;
    padding: 20px;
    border-radius: 20px;
  }

  input {
    background-color: transparent;
    padding: 8px;
    border-radius: 23px;
    color: #fff;
  }

  label {
    color: #ccc;
    font-weight: bold;
    display: flex;
    align-self: flex-start;
    margin-left: 50px;
    margin-top: 10px;
  }

  .bookmarkBtn {
    margin-top: 15px;
    width: 110px;
    height: 40px;
    border-radius: 40px;
    border: 1px solid rgba(255, 255, 255, 0.349);
    background-color: rgb(12, 12, 12);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition-duration: 0.3s;
    overflow: hidden;
  }

  .IconContainer {
    width: 30px;
    height: 30px;
    background: #4CAF50;
    border-radius: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    z-index: 2;
    transition-duration: 0.3s;
  }


  .text {
    height: 100%;
    width: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    z-index: 1;
    transition-duration: 0.3s;
    font-size: .92em;
  }

  .bookmarkBtn:hover .IconContainer {
    width: 100px;
    transition-duration: 0.3s;
  }

  .bookmarkBtn:hover .text {
    transform: translate(10px);
    width: 0;
    font-size: 0;
    transition-duration: 0.3s;
  }

  .bookmarkBtn:active {
    transform: scale(0.95);
    transition-duration: 0.3s;
  }

  .voltar {
    display: flex;
    justify-content: center;
    margin-bottom: 20px;
  }

  select {
    margin-top: 10px;
    background-color: transparent;
    padding: 8px;
    border-radius: 23px;
    color: #ccc;
    cursor: pointer;
  }

  select option {
    background-color: #333;
  }
</style>
<header>
  <h1>Produto</h1>
</header>
<main>
  <?php

  $idProduto = $_POST["idProduto"];
  $nomeProduto = $_POST["nomeProduto"];
  $avaliaçãoProduto = $_POST["avaliaçãoProduto"];
  $statusProduto = $_POST["statusProduto"];
  $anoFabricacao = $_POST["anoFabricacao"];
  $dimensoesProduto = $_POST["dimensoesProduto"];
  $pesoProduto = $_POST["pesoProduto"];
  $idFornecedor = $_POST["idFornecedor"];
  $idGrupo = $_POST["idGrupo"];

  echo "
  <form method='post' action='alteracao.php' enctype='multipart/form-data' class='inputs'>
    <label>ID:</label>
    <input type='number' name='idProduto' value='$idProduto' readonly>
    <label>Nome:</label>
    <input type='text' name='nomeProduto' value='$nomeProduto'>
    <label>Avaliação:</label>
    <select name='avaliaçãoProduto' value='$avaliaçãoProduto'>
        <option value='1'>1</option>
        <option value='2'>2</option>
        <option value='3'>3</option>
        <option value='4'>4</option>
        <option value='5'>5</option>
    </select>
    <label>Status:</label>
    <select name='statusProduto' value='$statusProduto'>
        <option value='1'>Disponível</option>
        <option value='0'>Indisponível</option>
    </select>
    <label>Ano de fabricação:</label>
    <input type='number' name='anoFabricacao' value='$anoFabricacao'>
    <label>Dimensões:</label>
    <input type='text' placeholder='nXn' name='dimensoesProduto' value='$dimensoesProduto'>
    <label>Peso:</label>
    <input type='float' name='pesoProduto' value='$pesoProduto'>
    <label>Fornecedor:</label>
    <select name='idFornecedor' value='$idFornecedor'>";
  $servername = "localhost";
  $database = "loja001";
  $username = "root";
  $password = "";

  // Conexão com o banco de dados
  $conn = mysqli_connect($servername, $username, $password, $database);
  // Verifica a conexão
  $sql = 'SELECT * FROM fornecedor order by nomeFornecedor asc';
  // Executa a instrução SQL SELECT e armazena o resultado em uma variável
  $resultado = mysqli_query($conn, $sql) or die("Erro ao executar a consulta");
  // Percorre cada linha do resultado da consulta
  while ($row = mysqli_fetch_array($resultado)) {
    // Extrai os valores das colunas da linha atual
    $idFornecedor = $row["idFornecedor"]; // ID do médico
    $nomeFornecedor = $row["nomeFornecedor"];
    // Verifica se o médico atual é o mesmo que o paciente já possui
    echo "<option value='$idFornecedor'>" . $nomeFornecedor . "</option>";
  }
  echo "
      </select>
      <label>Grupo:</label>
      <select name='idGrupo' value'$idGrupo'>";
  $servername = "localhost";
  $database = "loja001";
  $username = "root";
  $password = "";

  $conn1 = mysqli_connect($servername, $username, $password, $database); // Conexão com o banco de dados
  
  $sql1 = 'SELECT * FROM grupo order by nomeGrupo asc'; // Consulta SQL para recuperar os médicos, ordenados por nome
  
  $resultado1 = mysqli_query($conn1, $sql1) or die("erro"); // Execução da consulta SQL e verificação de erros
  
  while ($row1 = mysqli_fetch_array($resultado1)) { // Iteração sobre os resultados da consulta
    $idGrupo = $row1["idGrupo"]; // ID do médico
    $nomeGrupo = $row1["nomeGrupo"]; // Nome do médico
  
    echo "<option value='$idGrupo'>" . $nomeGrupo . "</option>"; // Geração das opções do menu suspenso com os nomes dos médicos
  }
  echo "
        </select>
           <button class='bookmarkBtn'>
                    <span class='IconContainer'>
                        <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 520 612' height='1.2em' class='icon'>
                            <path
                                d='M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z' />
                        </svg>
                    </span>
                    <p class='text'>Alterar</p>
                </button>
                 
        </form>";
  mysqli_close($conn);
  ?>
</main>
<form method="post" action="consultar.php" class="voltar">
  <button class="bookmarkBtn">
    <span class="IconContainer">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 520 612" height="1.2em" class="icon">
        <path
          d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
      </svg>
    </span>
    <p class="text">Voltar</p>
  </button>
</form>