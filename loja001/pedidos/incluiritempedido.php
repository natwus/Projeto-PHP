<style>
    * {
        margin: 0;
    }

    body {
        background-color: #ccc;
        display: flex;
        justify-content: center;
        padding-top: 60px;
    }

    .tudo{
        font-family: Arial, sans-serif;
        background-color: #333;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 25px;
        width: 500px;
        height: 600px;
        border-radius: 20px;
    }

    input {
      background-color: transparent;
      padding: 8px;
      border-radius: 23px;
      margin-bottom: 15px;
    }

    label {
      color: #ccc;
      font-weight: bold;
      display: flex;
      align-self: center;
      margin-top: 10px;
    }
    
    select {
        margin-top: 10px;
        background-color: transparent;
        padding: 8px;
        border-radius: 23px;
        color: #ccc;
        cursor: pointer;
    }

    .botaoVoltar {
        justify-content: center;
        margin: 20px 0;
    }

    .incluirItem {
        display: flex;
        margin: 20px 0;
        flex-direction: column;
        width: 300px;
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

    form{
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    table {
        background-color: #ccc;
        color: #333;
        border-radius: 20px;
    }

    th {
        padding: 5px;
    }

    td {
        padding: 5px;
    }
</style>

<body>
    <div class="tudo">
    <table border="1">
        <th>ID</th>
        <th>Pedido</th>
        <th>Produto</th>
        <th>Quantidade</th>
        <th>Valor total</th>
        <?php
        $idtabelapreco = $_POST["idtabelaprecos"];
        $idpedido = $_POST["idPedido"];
        // Inclui o arquivo "conexao.php" que contém as informações de conexão ao banco de dados MySQL
        include ("conexao.php");
        // Define a instrução SQL SELECT que seleciona todos os campos da tabela "paciente"
        $sql = "SELECT * FROM itenspedido where idPedido='$idpedido'";
        // Executa a instrução SQL SELECT e armazena o resultado em uma variável
        $resultado = mysqli_query($conn, $sql) or die("erro");
        // Percorre cada linha do resultado da consulta
        while ($row = mysqli_fetch_array($resultado)) {
            // Extrai os valores das colunas da linha atual
            $idItensPedido = $row["idItensPedido"];
            $idPedido = $row["idPedido"];
            $quantidadePedido = $row["quantidadePedido"];
            $valorTotalPedido = $row["valorTotalPedido"];
            $idProduto = $row["idProduto"];

            $sql1 = "SELECT * FROM produto where idProduto='$idProduto'";
            // Executa a instrução SQL SELECT e armazena o resultado em uma variável
            $resultado1 = mysqli_query($conn, $sql1) or die("erro");
            // Percorre cada linha do resultado da consulta
            while ($row1 = mysqli_fetch_array($resultado1)) {
                $nomeProduto = $row1["nomeProduto"];
            }
            echo "<tr>";
            echo "<td>" . $idItensPedido . "</td>";
            echo "<td>" . $idPedido . "</td>";
            echo "<td>" . $nomeProduto . "</td>";
            echo "<td>" . $quantidadePedido . "</td>";
            echo "<td>" . $valorTotalPedido . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "
                    <form class='incluirItem' method='post' action='gravaritenspedido.php'>
                        <input hidden type='number' value='$idpedido' name='idPedido'>
                        <input hidden type='number' value='$idtabelapreco' name='idtabelaprecos'>
                        <label>Selecione o produto: </label>
                        <select name='produto'>";

        include ("conexao.php");

        $sql = "SELECT a.idTabelaprecos, a.valorProduto, a.idProduto, b.nomeProduto FrOM tabelaprecos a, produto b where a.idTabelaprecos='$idtabelapreco' and a.idProduto=b.idProduto";

        $resultado = mysqli_query($conn, $sql) or die("Erro ao executar a consulta");

        while ($row = mysqli_fetch_array($resultado)) {
            $idTabelaprecos = $row["idTabelaprecos"];
            $valorProduto = $row["valorProduto"];
            $idProduto = $row["idProduto"];
            $idNome = $row["nomeProduto"];

            echo "<option value='$idProduto,$valorProduto'> $idProduto-$idNome-$valorProduto</option>";
        }

        echo " </select>
                           <label>Quantidade:</label>
                           <input type='number' name='qtd'> <button class='bookmarkBtn'>
                <span class='IconContainer'>
                    <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 520 612' height='1.2em' class='icon'>
                        <path
                            d='M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z'/>
                    </svg>
                </span>
                <p class='text'>Cadastrar</p>
            </button>
                    </form>";
        // Fecha a conexão com o banco de dados MySQL
        mysqli_close($conn);
        ?>
        <form class="botaoVoltar" method="post" action="menu.php">
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
        </div>
</body>