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
</style>
<header>
  <h1>Cliente</h1>
</header>
<main>
  <?php
  // Variáveis de conexão ao banco de dados
  include ("conexao.php");
  // Variáveis que recebem os dados do paciente do formulário
  $idCliente = $_POST["idCliente"];
  $nomeCliente = $_POST["nomeCliente"];
  $cpfCliente = $_POST["cpfCliente"];
  $nascimentoCliente = $_POST["nascimentoCliente"];
  $cepCliente = $_POST["cepCliente"];
  $estadoCliente = $_POST["estadoCliente"];
  $cidadeCliente = $_POST["cidadeCliente"];
  $enderecoCliente = $_POST["enderecoCliente"];
  $numeroCliente = $_POST["numeroCliente"];
  $sexoCliente = $_POST["sexoCliente"];
  $telCliente = $_POST["telCliente"];
  $emailCliente = $_POST["emailCliente"];
  echo "
  <head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Alterar</title>
  </head>";
  echo "
  <form method='post' action='alteracao.php' enctype='multipart/form-data' class ='inputs'>
   
    <label>ID:</label>
    <input type='number' name='id' value='$idCliente' readonly>
    <label>Nome:</label>
    <input type='text' name='nome' value='$nomeCliente'>
    <label>CPF:</label>
    <input type='number' name='cpf' value='$cpfCliente'>
    <label>Data de nascimento:</label>
    <input type='date' name='data' value='$nascimentoCliente'>
    <label>CEP:</label>
    <input type='number' name='cep' value='$cepCliente'>
    <label>Estado:</label>
    <input type='text' name='estado' value='$estadoCliente'>
    <label>Cidade:</label>
    <input type='text' name='cidade' value='$cidadeCliente'>
    <label>Rua:</label>
    <input type='text' name='rua' value='$enderecoCliente'>
    <label>Numero:</label>
    <input type='number' name='numero' value='$numeroCliente'>
    <label>Sexo:</label>
    <input type='text' name='sexo' value='$sexoCliente'>
    <label>Telefone:</label>
    <input type='number' name='tel' value='$telCliente'>
    <label>E-mail:</label>
    <input type='email' name='email' value='$emailCliente'>
     <button class='bookmarkBtn'>
                    <span class='IconContainer'>
                        <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 520 612' height='1.2em' class='icon'>
                            <path
                                d='M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z' />
                        </svg>
                    </span>
                    <p class='text'>Alterar</p>
                </button>
            </form>    
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