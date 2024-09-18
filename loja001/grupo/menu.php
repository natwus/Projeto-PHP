<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grupo</title>
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
            flex-direction: column;
            gap: 30px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        form{
            transform: scale(140%);
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

<body>
    <header>
        <h1>Menu Grupo</h1>
    </header>
    <main>
        <form action="cadastrarGrupo.php">
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
        <form action="consultar.php">
            <button class="bookmarkBtn">
                <span class="IconContainer">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 520 612" height="1.2em" class="icon">
                        <path
                            d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                    </svg>
                </span>
                <p class="text">Consultar</p>
            </button>
        </form>
        <form action="/aula-php/loja001/menuGeral.php">
            <button class="bookmarkBtn">
                <span class="IconContainer">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 520 612" height="1.2em" class="icon"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
                </span>
                <p class="text">Voltar</p>
            </button>
        </form>
    </main>
</body>

</html>
<!-- viewBox="0 0 520 612" height="1.2em" class="icon" -->