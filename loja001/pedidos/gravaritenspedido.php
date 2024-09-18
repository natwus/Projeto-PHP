<head>
  <style>
    body{
      font-family: Arial, sans-serif;
      background-color: #ccc;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    .bookmarkBtn {
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
  </style>
</head>

<?php
// Recebe o conteudo da variavel através do método POST
$idPedido = $_POST["idPedido"];
$idtabelapreco = $_POST["idtabelaprecos"];
$produto = $_POST["produto"];
$qtd = $_POST["qtd"];

list ($valor1,$valor2) = explode (',',$produto);

$produto1 =$valor1;
$valorProduto = $valor2;

$valortotal = $qtd * $valorProduto;

include ("conexao.php");

$sql = "INSERT INTO itenspedido (idPedido, quantidadePedido, valorTotalPedido, idProduto) VALUES('$idPedido', '$qtd', '$valortotal', '$produto1')";

if (mysqli_query($conn, $sql)) {

} else {
    // Exibe a mensagem de erro "Error!" e detalhes do erro
    echo "<br>Error:!" . $sql . "<br>" . mysqli_error($conn);
}

echo "<form method='post' action='incluiritempedido.php'>
    <input hidden type='number' value='$idPedido' name='idPedido'>
    <input hidden type='number' value='$idtabelapreco' name='idtabelaprecos'>
    <button class='bookmarkBtn'>
                <span class='IconContainer'>
                    <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 520 612' height='1.2em' class='icon'>
                        <path
                            d='M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z' />
                    </svg>
                </span>
                <p class='text'>Ver</p>
            </button>
    </form>";

mysqli_close($conn);
