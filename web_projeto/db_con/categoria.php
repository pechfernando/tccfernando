<?php
require_once 'init.php';

// Consulta SQL para buscar os IDs e nomes das categorias no banco de dados
$sql_categorias = "SELECT id_categoria, nome FROM categoria";
$result_categorias = $conn->query($sql_categorias);

// Array para armazenar as categorias
$categorias = array();

if ($result_categorias->num_rows > 0) {
    // Itera sobre os resultados e armazena os IDs e nomes das categorias no array
    while ($row_categoria = $result_categorias->fetch_assoc()) {
        // Armazenar tanto o ID quanto o nome no array $categorias
        $categorias[] = array(
            'id' => $row_categoria['id_categoria'],
            'nome' => $row_categoria['nome']
        );
    }
}

?>
