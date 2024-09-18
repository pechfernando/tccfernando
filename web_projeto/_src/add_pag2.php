<?php
    
require_once '../db_con/init.php';
require_once '../db_con/pagamento.php';
require_once '../db_con/categoria.php';

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar os dados do formulário
    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];
    $data = $_POST['data'];
    $categoria_id = $_POST['categoria']; // Supondo que este seja o ID da categoria selecionada
    $pagamento_id = $_POST['pagamento']; // Supondo que este seja o ID do método de pagamento selecionado

    session_start(); // Inicia a sessão
  
    // O usuário está logado, então você pode recuperar o ID do usuário da sessão
    $id_usuario = $_SESSION['user_id'];

    
 // Preparar e executar a consulta SQL para inserir os dados
 $sql = "INSERT INTO transacao (descricao, valor, data, id_categoria, id_metodo, id_usuario) VALUES (?, ?, ?, ?, ?, ?)";
    
 $stmt = $conn->prepare($sql);
 $stmt->bind_param("sdsiii", $descricao, $valor, $data, $categoria_id, $pagamento_id, $id_usuario);

 if ($stmt->execute()) {
     echo "Dados inseridos com sucesso!";
     header('Location: ../src/painel.php');
 } else {
     echo "Erro ao inserir dados: " . $stmt->error;
 }
 
 $stmt->close();
}

// Fechar conexão
$conn->close();
?>
