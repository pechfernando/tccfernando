<?php

require_once '../db_con/init.php';

// pega os dados do formuário
$name = isset($_POST['name']) ? $_POST['name'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$psw = isset($_POST['password']) ? $_POST['password'] : null;

// cria o hash da senha usando password_hash
$passwordHash = password_hash($psw, PASSWORD_DEFAULT);

// insere no banco
$PDO = db_connect();
$sql = "INSERT INTO usuarios (nome, email, senha) VALUES(:name, :email, :password)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $passwordHash);


if ($stmt->execute())
{
    header('Location: ../index.php');
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}