<?php
session_start();
require_once '../db_con/init.php';
require_once '../src/check.php';
require_once '../db_con/pagamento.php';
require_once '../db_con/categoria.php';
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

        h2 {
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

        input[type="text"], input[type="date"], select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
            box-sizing: border-box;
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
        <h2>Despesas</h2>
        <form action="add_pag2.php" method="post">
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <input type="text" id="descricao" name="descricao" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="valor">Valor:</label>
                <input type="text" id="valor" name="valor" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="data">Data:</label>
                <input type="date" id="data" name="data" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="categoria">Categoria:</label>
                <select id="id_categoria" name="categoria" class="form-control">
                    <?php
                        foreach ($categorias as $opcao) {
                            echo "<option value='" . $opcao['id'] . "'>" . $opcao['nome'] . "</option>";
                        }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="pagamento">Pagamento:</label>
                <select id="id_pagamento" name="pagamento" class="form-control">
                    <?php
                        foreach ($opcoes_pagamento as $opcao) {
                            echo "<option value='" . $opcao['id'] . "'>" . $opcao['nome'] . "</option>";
                        }
                    ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
        </form><br>
        <a href="../src/painel.php"><button type="button" class="btn btn-secondary">Voltar ao Painel Inicial</button></a>
    </div>
</body>
</html>
