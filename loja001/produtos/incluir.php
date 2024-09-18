<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente</title>
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
</head>

<body>
    <header>
        <h1>Produtos</h1>
    </header>
    <main>
        <div>
            <form method="post" action="inclusao.php" enctype="multipart/form-data" class="inputs">
                <label>Nome:</label>
                <input type="text" name="nome">
                <label>Avaliação:</label>
                <select name="avaliacao">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <label>Status:</label>
                <select name="status">
                    <option value="1">Disponível</option>
                    <option value="0">Indisponível</option>
                </select>
                <label>Ano de fabricação:</label>
                <input type="number" name="anoFabricacao">
                <label>Dimensões:</label>
                <input type="text" placeholder="nXn" name="dimensoes">
                <label>Peso:</label>
                <input type="float" name="peso">
                <label>Fornecedor:</label>
                <select name="fornecedor">
                    <?php
                    // PHP para conectar ao banco de dados e recuperar os médicos
                    
                    $servername = "localhost"; // Nome do servidor MySQL
                    $database = "loja001"; // Nome do banco de dados
                    $username = "root"; // Nome de usuário do MySQL
                    $password = ""; // Senha do MySQL
                    
                    $conn = mysqli_connect($servername, $username, $password, $database); // Conexão com o banco de dados
                    
                    $sql = "SELECT * FROM fornecedor order by nomeFornecedor asc"; // Consulta SQL para recuperar os médicos, ordenados por nome
                    
                    $resultado = mysqli_query($conn, $sql) or die("erro"); // Execução da consulta SQL e verificação de erros
                    
                    while ($row = mysqli_fetch_array($resultado)) { // Iteração sobre os resultados da consulta
                        $idFornecedor = $row["idFornecedor"]; // ID do médico
                        $nomeFornecedor = $row["nomeFornecedor"]; // Nome do médico
                    
                        echo "<option value='$idFornecedor'>" . $nomeFornecedor . "</option>"; // Geração das opções do menu suspenso com os nomes dos médicos
                    }
                    ?>
                </select>
                <label>Grupo:</label>
                <select name="grupo">
                    <?php
                    // PHP para conectar ao banco de dados e recuperar os médicos
                    
                    $servername = "localhost"; // Nome do servidor MySQL
                    $database = "loja001"; // Nome do banco de dados
                    $username = "root"; // Nome de usuário do MySQL
                    $password = ""; // Senha do MySQL
                    
                    $conn = mysqli_connect($servername, $username, $password, $database); // Conexão com o banco de dados
                    
                    $sql = "SELECT * FROM grupo order by nomeGrupo asc"; // Consulta SQL para recuperar os médicos, ordenados por nome
                    
                    $resultado = mysqli_query($conn, $sql) or die("erro"); // Execução da consulta SQL e verificação de erros
                    
                    while ($row = mysqli_fetch_array($resultado)) { // Iteração sobre os resultados da consulta
                        $idGrupo = $row["idGrupo"]; // ID do médico
                        $nomeGrupo = $row["nomeGrupo"]; // Nome do médico
                    
                        echo "<option value='$idGrupo'>" . $nomeGrupo . "</option>"; // Geração das opções do menu suspenso com os nomes dos médicos
                    }
                    ?>
                </select>
                <button class="bookmarkBtn">
                    <span class="IconContainer">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 520 612" height="1.2em" class="icon">
                            <path
                                d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                        </svg>
                    </span>
                    <p class="text">Cadastrar</p>
                </button>
            </form>
            <form method="post" action="menu.php" class="voltar">
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
    </main>
</body>

</html>