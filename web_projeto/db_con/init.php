<?php
// constantes com as credenciais de acesso ao banco MySQL
define('DB_HOST', 'localhost');
define('DB_USER', 'tcc');
define('DB_PASS', 'tcc123');
define('DB_NAME', 'testetcc');

// habilita todas as exibições de erros
ini_set('display_errors', true);
error_reporting(E_ALL);

// inclui o arquivo de funções
require_once 'functions.php';

// cria a conexão com o banco de dados
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// verifica se ocorreu algum erro na conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
