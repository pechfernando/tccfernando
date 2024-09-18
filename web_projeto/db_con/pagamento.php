<?php
require_once 'init.php'; 

// Consulta SQL para buscar os IDs e nomes dos métodos de pagamento no banco de dados
$sql_pagamentos = "SELECT id_pagamento, nome FROM pagamento";
$result_pagamentos = $conn->query($sql_pagamentos);

// Array para armazenar as opções de pagamento
$opcoes_pagamento = array();

if ($result_pagamentos->num_rows > 0) {
    // Iterar sobre os resultados e armazenar os IDs e nomes das opções de pagamento no array
    while ($row_pagamento = $result_pagamentos->fetch_assoc()) {
        // Armazenar tanto o ID quanto o nome no array $opcoes_pagamento
        $opcoes_pagamento[] = array(
            'id' => $row_pagamento['id_pagamento'],
            'nome' => $row_pagamento['nome']
        );
    }
}

?>
