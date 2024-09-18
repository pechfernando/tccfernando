<?php

require_once '../db_con/init.php';
require_once '../db_con/functions.php';

// resgata variáveis do formulário e faz a sanitização do email
$email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

if (empty($email) || empty($password)) {
    echo "Informe email e senha";
    exit;
}

try {
    // Obtém a senha armazenada no banco de dados para o e-mail fornecido
    $PDO = db_connect();

    $sql = "SELECT id_usuario, nome, senha FROM usuarios WHERE email = :email";
    $stmt = $PDO->prepare($sql);

    $stmt->bindParam(':email', $email);
    $stmt->execute();

    // Obtém o resultado da consulta
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica se o usuário foi encontrado e se a senha está correta
    if (!$user || !isset($user['senha']) || $user['senha'] === null || $user['senha'] === '' || !password_verify($password, $user['senha'])) {
        echo "Email ou senha incorretos";
        exit;
    }

    // pega o primeiro usuário
    session_start();
    $_SESSION['logged_in'] = true;
    $_SESSION['user_id'] = $user['id_usuario'];
    $_SESSION['user_name'] = $user['nome'];
   

    // Redireciona para o painel após o login bem-sucedido
    header('Location: painel.php');
    exit;
} catch (PDOException $e) {
    // Tratamento de erro ao conectar-se ao banco de dados ou executar a consulta
    echo "Erro ao processar o login. Por favor, tente novamente mais tarde.";
   
    exit;
}



