<?php
//Conecta com o MySQL usando PDO 
 
function db_connect()
{
    try {
        $PDO = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $PDO;
    } catch (PDOException $e) {
        die("Erro na conexão com o banco de dados: " . $e->getMessage());
    }
}
//Cria o hash da senha usando password_hash 
 
function make_hash($str)
{
    return password_hash($str, PASSWORD_DEFAULT);
}

//Verifica se a senha corresponde ao hash usando password_verify 
 
function verify_hash($str, $hash)
{
    return password_verify($str, $hash);
}

//Verifica se o usuário está logado 
 
function isLoggedIn()
{
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        return false;
    }
    return true;
}
?>