<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar</title>
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
      padding-bottom: 60px;
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
    }
    select{
      margin-top: 10px;
      background-color: transparent;
      padding: 8px;
      border-radius: 23px;
      color: #ccc;
      cursor: pointer;
    }

    select option{
      background-color: #333;
    }
  </style>
</head>
<body>
<header>
    <h1>Grupo</h1>
</header>
<main>
    <?php

    include ("conexao.php");

    $idGrupo = $_POST['idGrupo'];
    $nomeGrupo = $_POST['nomeGrupo'];
    $descricaoGrupo = $_POST['descricaoGrupo'];
    $idCategoria = $_POST['idCategoria'];
    $idCateguria = $_POST['idCategoria'];

    echo "<form action=alteracao.php method=post class='inputs'>";
    echo "<input type=hidden name=idGrupo value=$idGrupo>";
    echo "Nome do Grupo";
    echo "<input type=text name=nomeGrupo  value=$nomeGrupo>";
    echo "Descrição Grupo";
    echo "<input type=text name=descricaoGrupo  value=$descricaoGrupo>";

    echo " Categoria: <select name= 'idCategoria'>";
    $sql = "SELECT * FROM categoria";

    $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar dados");

    // loop para ler todos os registros
    while ($registro = mysqli_fetch_array($resultado)) {
        $idCategoria = $registro['idCategoria'];
        $nomeCategoria = $registro['nomeCategoria'];

        if ($idCategoria == $idCateguria) {
            echo "<option value='$idCategoria' selected>$nomeCategoria</option>";
        } else {
            echo "<option value='$idCategoria'>$nomeCategoria</option>";
        }
    }
    echo "</select>";
    echo "<button class='bookmarkBtn'>
                    <span class='IconContainer'>
                        <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 520 612' height='1.2em' class='icon'>
                            <path
                                d='M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z' />
                        </svg>
                    </span>
                    <p class='text'>Alterar</p>
                </button>
            </form>    ";
    echo "</form>";

    mysqli_close($conn);
    echo "</table>";
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
</body>
</html>