<?php

class ContasReceber
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function adicionarConta($cliente, $valor, $dataVencimento)
    {
        try {
            $sql = "INSERT INTO contas_receber (cliente, valor, data_vencimento) VALUES (:cliente, :valor, :data_vencimento)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':cliente', $cliente);
            $stmt->bindParam(':valor', $valor);
            $stmt->bindParam(':data_vencimento', $dataVencimento);

            return $stmt->execute();
        } catch (PDOException $e) {            
            return false;
        }
    }

    public function obterContasReceber()
    {
        try {
            $sql = "SELECT * FROM contas_receber";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {            
            return false;
        }
    }
  
}
