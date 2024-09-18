<body>
<style>
        * {
            margin: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #ccc;
            text-align: center;
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

        .botaoVoltar {
            display: flex;
            justify-content: center;
            margin: 20px 0;
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

        .button {
            all: unset;
            display: flex;
            align-items: center;
            position: relative;
            padding: 0.1em 1em;
            border: black solid 0.15em;
            border-radius: 0.25em;
            color: white;
            font-size: 1.5em;
            font-weight: 600;
            cursor: pointer;
            overflow: hidden;
            transition: border 300ms, color 300ms;
            user-select: none;
            margin: 5px;
        }

        .button p {
            z-index: 1;
        }

        .button:hover {
            color: #ccc;
        }

        .button:active {
            border-color: teal;
        }

        .button::after,
        .button::before {
            content: "";
            position: absolute;
            width: 9em;
            aspect-ratio: 1;
            background: red;
            opacity: 50%;
            border-radius: 50%;
            transition: transform 500ms, background 300ms;
        }

        .button::before {
            left: 0;
            transform: translateX(-8em);
        }

        .button::after {
            right: 0;
            transform: translateX(8em);
        }

        .button:hover:before {
            transform: translateX(-1em);
        }

        .button:hover:after {
            transform: translateX(1em);
        }

        .button:active:before,
        .button:active:after {
            background: teal;
        }

        .button1 {
            all: unset;
            display: flex;
            align-items: center;
            position: relative;
            padding: 0.1em 1em;
            border: blue solid 0.15em;
            border-radius: 0.25em;
            color: blue;
            font-size: 1.5em;
            font-weight: 600;
            cursor: pointer;
            overflow: hidden;
            transition: border 300ms, color 300ms;
            user-select: none;
            margin: 5px;
        }

        .button1 p {
            z-index: 1;
        }

        .button1:hover {
            color: #ccc;
        }

        .button1:active {
            border-color: teal;
        }

        .button1::after,
        .button1::before {
            content: "";
            position: absolute;
            width: 9em;
            aspect-ratio: 1;
            background: blue;
            opacity: 50%;
            border-radius: 50%;
            transition: transform 500ms, background 300ms;
        }

        .button1::before {
            left: 0;
            transform: translateX(-8em);
        }

        .button1::after {
            right: 0;
            transform: translateX(8em);
        }

        .button1:hover:before {
            transform: translateX(-1em);
        }

        .button1:hover:after {
            transform: translateX(1em);
        }

        .button1:active:before,
        .button1:active:after {
            background: teal;
        }

        table{
            background-color: #333;
            color: #ccc;
            border-radius: 20px;
        }

        th{
            padding: 5px;
        }

        td{
            padding: 5px;
        }

        .tabelaItens{
            margin-left: 150px;
        }
    </style>
    <main>
    <table border="5">
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>Data do pedido</th>
            <th>Previsão de entrega</th>
            <th>Data do pagamento</th>
            <th>Status</th>
            <th>Cliente</th>
            <th>Ação</th>
        </tr>
        <?php
        include ("conexao.php");
        // Inicia a soma dos valores de todos os pedidos
        $somaValorTodosPedidos = 0;

        $sql = "SELECT * FROM pedidos";
        $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar dados dos pedidos");

        while ($row = mysqli_fetch_array($resultado)) {
            $idPedido = $row["idPedido"];
            $descricaoPedido = $row["descricaoPedido"];
            $dataPedido = $row["dataPedido"];
            $dataEntrega = $row["dataEntrega"];
            $pagamentoPedido = $row["pagamentoPedido"];
            $statusPedido = $row["statusPedido"];
            $idCliente = $row["idCliente"];

            if ($statusPedido == 0) {
                $status = 'Em preparação';
            } elseif ($statusPedido == 1) {
                $status = 'A caminho';
            } else {
                $status = 'Concluído';
            }

            $sqlCliente = "SELECT nomeCliente FROM cliente WHERE idCliente = '$idCliente'";
            $resultadoCliente = mysqli_query($conn, $sqlCliente) or die("Erro ao retornar dados do cliente");
            $rowCliente = mysqli_fetch_array($resultadoCliente);
            $nomeCliente = $rowCliente["nomeCliente"];

            // Inicia a soma dos valores dos itens para este pedido
            $somaValorItens = 0;

            echo "<tr>";
            echo "<td>" . $idPedido . "</td>";
            echo "<td>" . $descricaoPedido . "</td>";
            echo "<td>" . $dataPedido . "</td>";
            echo "<td>" . $dataEntrega . "</td>";
            echo "<td>" . $pagamentoPedido . "</td>";
            echo "<td>" . $status . "</td>";
            echo "<td>" . $nomeCliente . "</td>";
            echo "
                    <td>
                        <form method='post' action='excluir.php'>
                            <input hidden type='number' value='$idPedido' name='idPedido'>
                            <button class='button'><p>Excluir</p></button>
                        </form>
                    </td>";
            echo "</tr>
                    <tr>
                        <td colspan='8'><br>
                        <table class='tabelaItens' border='1'>
                                <th>ID Item</th>
                                <th>Quantidade</th>
                                <th>Valor Pedido</th>
                                <th>Produto</th>
                                <th>Ação</th>
                            </tr>";

            $sqlItens = "SELECT * FROM itenspedido WHERE idPedido = '$idPedido'";
            $resultadoItens = mysqli_query($conn, $sqlItens) or die("Erro ao retornar dados dos itens do pedido");

            while ($item = mysqli_fetch_array($resultadoItens)) {
                $idItensPedido = $item["idItensPedido"];
                $quantidadePedido = $item["quantidadePedido"];
                $valorTotalPedido = $item["valorTotalPedido"];
                $idProduto = $item["idProduto"];
                // Acumula o valor total dos itens
                $somaValorItens += $valorTotalPedido;

                $sqlProduto = "SELECT nomeProduto FROM produto WHERE idProduto = '$idProduto'";
                $resultadoProdutos = mysqli_query($conn, $sqlProduto) or die("Erro ao retornar dados do produto");
                $produto = mysqli_fetch_array($resultadoProdutos);
                $nomeProduto = $produto["nomeProduto"];

                echo "<tr>";
                echo "<td>" . $idItensPedido . "</td>";
                echo "<td>" . $quantidadePedido . "</td>";
                echo "<td>" . $valorTotalPedido . "</td>";
                echo "<td>" . $nomeProduto . "</td>";
                echo "
                    <td>
                        <form method='post' action='excluirItem.php'>
                            <input hidden type='number' value='$idItensPedido' name='idItensPedido'>
                            <button class='button'><p>Excluir</p></button>
                        </form>
                    </td>";
                echo "</tr>";
            }

            echo "<tr>";
            echo "<td colspan='4'>Valor Total do Pedido</td>";
            echo "<td>R$" . $somaValorItens . "</td>";
            echo "</tr>";
            echo "</table><br><br>";
            echo "</td></tr>";
            // Acumula o valor total dos itens no valor total de todos os pedidos
            $somaValorTodosPedidos += $somaValorItens;
        }
        // Fecha a conexão com o banco de dados MySQL
        mysqli_close($conn);
        ?>
    </table>
    </main>
    <h1>Valor total dos pedidos: R$<?php echo $somaValorTodosPedidos; ?></h1>
    <form class="botaoVoltar" method='post' action='menu.php'>
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