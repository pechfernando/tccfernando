<?php
session_start();
require_once '../db_con/init.php';
require '../src/check.php';
?>

<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tela</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <style>
        body {
            background-color: #e0e0e0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            background-color: #f5f5f5;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
            max-width: 700px;
            width: 100%;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            color: #333;
        }

        input[type="text"], input[type="radio"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
            box-sizing: border-box;
        }

        input[type="radio"] {
            width: auto;
            margin-right: 10px;
            margin-bottom: 0;
        }

        .btn-primary {
            background-color: #78909c;
            border: none;
            color: #ffffff;
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
            margin-top: 15px;
        }

        .btn-primary:hover {
            background-color: #607d8b;
        }

        .btn-secondary {
            background-color: #8d6e63;
            border: none;
            color: #ffffff;
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
            margin-top: 10px;
        }

        .btn-secondary:hover {
            background-color: #795548;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Título</h1>
        <form action="add_pag3.php" method="post">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" class="form-control" id="nome" required>
            </div>

            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <input type="text" name="descricao" class="form-control" id="descricao" required>
            </div>

            <div class="form-group">
                <label>Categoria ou Pagamento:</label><br>
                <input type="radio" name="radio" value="1" id="categoria">
                <label for="categoria">Categoria</label>
                <input type="radio" name="radio" value="2" id="pagamento">
                <label for="pagamento">Pagamento</label>
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
        </form><br>
        <a href="../src/painel.php"><button type="button" class="btn btn-secondary">Voltar ao Painel Inicial</button></a>
    </div>
</body>
</html>
