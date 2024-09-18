<?php
session_start();
require_once '../db_con/init.php';
require '../src/check.php';

$id_usuario = $_SESSION['user_id'];
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

// Escapar caracteres especiais para evitar injeção de SQL
$searchTerm = $conn->real_escape_string($searchTerm);

// Query para recuperar despesas com informações de categoria e método
$sql = "
    SELECT t.id_transacao, t.descricao, t.valor, t.data, c.nome AS categoria, p.nome AS metodo
    FROM transacao t
    LEFT JOIN categoria c ON t.id_categoria = c.id_categoria
    LEFT JOIN pagamento p ON t.id_metodo = p.id_pagamento
    WHERE t.id_usuario = $id_usuario
";

if (!empty($searchTerm)) {
    $sql .= " AND t.descricao LIKE '%$searchTerm%'";
}

$result = $conn->query($sql);
?>

<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Despesas</title>
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
            max-width: 800px;
            width: 100%;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            margin-bottom: 20px;
            text-align: center;
        }

        label {
            font-weight: bold;
            color: #333;
        }

        input[type="text"] {
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
            width: 50%;
        }

        button[type="submit"], .btn-secondary {
            background-color: #78909c;
            border: none;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
            margin-top: 10px;
        }

        button[type="submit"]:hover, .btn-secondary:hover {
            background-color: #607d8b;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #78909c;
            color: #ffffff;
        }

        .btn-secondary {
            background-color: #8d6e63;
            border: none;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
            text-align: center;
            display: block;
            margin: 0 auto;
        }

        .btn-secondary:hover {
            background-color: #795548;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Relatório de Despesas</h2>

        <form action="" method="GET">
            <label for="search">Buscar Despesas:</label>
            <input type="text" id="search" name="search" value="<?php echo htmlspecialchars($searchTerm); ?>">
            <button type="submit">Buscar</button>
        </form>

        <table>
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Valor</th>
                <th>Data do Vencimento</th>
                <th>Categoria</th>
                <th>Método</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Data em formato timestamp
                    $timestamp = strtotime($row["data"]);

                    // Formatar a data para o padrão d/m/Y
                    $row["data"] = date("d/m/Y", $timestamp);
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["id_transacao"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["descricao"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["valor"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["data"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["categoria"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["metodo"]) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Nenhuma despesa encontrada.</td></tr>";
            }
            ?>
        </table>

        <a href="../src/painel.php"><button type="button" class="btn-secondary">Voltar ao Painel Inicial</button></a>
    </div>
</body>
</html>
