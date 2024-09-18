<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <style>
        *{
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
            padding-top: 20px;
            text-align: center;
        }

        aside {
            background-color: #333;
            width: 200px;
            position: fixed;
            left: -245px;
            top: 0;
            bottom: 0;
            padding: 100px 20px 20px 20px;
            transition-duration: 0.5s;
        }

        aside form {
            margin-bottom: 10px;
        }

        button {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            border-radius: 10px;
            transition-duration: 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        .hide-aside {
            position: absolute;
            top: 35px;
            left: 25px;
            cursor: pointer;
            z-index: 999;
            color: #ccc;
            transform: scale(150%);
            transition-duration: 0.3s;
        }
        
        .hide-aside:hover{
            transform: scale(180%);
        }
    </style>
</head>

<body>
    <header>
        <h1>Loja 001</h1>
    </header>
    <main>
        <h3>Nada por aqui ainda</h3>
    </main>
    <span class="hide-aside" onclick="toggleSidebar()">&#9776;</span>
    <aside id="sidebar">
        <form method="post" action="/aula-php/loja001/cliente/menu.php">
            <button>Cliente</button>
        </form>
        <form method="post" action="/aula-php/loja001/fornecedor/menu.php">
            <button>Fornecedor</button>
        </form>
        <form method="post" action="/aula-php/loja001/categoria/menu.php">
            <button>Categoria</button>
        </form>
        <form method="post" action="/aula-php/loja001/grupo/menu.php">
            <button>Grupo</button>
        </form>
        <form method="post" action="/aula-php/loja001/produtos/menu.php">
            <button>Produto</button>
        </form>
        <form method="post" action="/aula-php/loja001/tabelaPrecos/menu.php">
            <button>Tabela Preços</button>
        </form>
        <form method="post" action="/aula-php/loja001/pedidos/menu.php">
            <button>Pedidos </button>
        </form>
    </aside>
    <script>
        function toggleSidebar() {
            var sidebar = document.getElementById("sidebar");
            if (sidebar.style.left === '0px') {
                sidebar.style.left = '-245px';
            } else {
                sidebar.style.left = '0px';
            }
        }
    </script>
</body>

</html>