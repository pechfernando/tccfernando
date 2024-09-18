<?php
session_start();
require_once '../db_con/init.php';
require 'check.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Painel Inicial</title>
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
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .btn {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            background-color: #78909c;
            color: #ffffff;
            border: none;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #607d8b;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bem-vindo ao Painel Inicial</h1>

        <!-- <a href="../_src/pag1.php"><button type="button" class="btn">Página 1 de teste</button></a> --> 
        <a href="../_src/pag2.php"><button type="button" class="btn">Despesas</button></a>
        <a href="../_src/pag3.php"><button type="button" class="btn">Cadastrar Categoria e Pagamentos</button></a>
        <a href="../_src/pag4.php"><button type="button" class="btn">Relatório</button></a>
        <a href="logout.php"><button type="button" class="btn">Logout</button></a>
    </div>
</body>
</html>
