
<?php
    
    require_once '../db_con/init.php';
    
    // Verifica se o formulário foi submetido
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $radioValue = $_POST["radio"];
        // Pega os dados do formulário
        $nome = isset($_POST['nome']) ? $_POST['nome'] : null;      
        $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : null;
        
        var_dump($situacao);
    
        try{          

            $PDO = db_connect();

            if ($radioValue == 1) {
                $sql = "INSERT INTO categoria (nome, descricao) VALUES(:nome, :descricao)";
            } elseif ($radioValue == 2) {
                $sql = "INSERT INTO pagamento (nome, descricao) VALUES(:nome, :descricao)";
            }
            
            $stmt = $PDO->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':descricao', $descricao);
        
            if ($stmt->execute()) {
                header('Location: ../src/painel.php');
            } else {
                echo "Erro ao cadastrar";
                print_r($stmt->errorInfo());
            }

        }catch (Exception $exc){
            echo "Erro ao cadastrar";
                print_r($stmt->errorInfo());

        }

        // Insere no banco
       
    } else {
        // Se o formulário não foi submetido, redireciona para a página inicial
        echo "outro erro";
           print_r($stmt->errorInfo());

        //header('Location: ../index.php');
    }
    ?>