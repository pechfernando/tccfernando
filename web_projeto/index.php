<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema</title>
    <link rel="stylesheet" href="css/bootstrap.css">
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
            padding: 30px; 
            max-width: 400px;
            width: 100%;
            box-sizing: border-box; 
        }

        h1 {
            margin-bottom: 25px; 
            font-size: 28px; 
            color: #333;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px; 
        }

        label {
            display: block; 
            font-weight: bold;
            color: #333;
            margin-bottom: 5px; 
        }

        .form-control {
            border-radius: 5px;
            padding: 12px; /
            font-size: 14px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            width: 100%; 
        }

        .btn-primary {
            background-color: #78909c;
            border: none;
            color: #ffffff;
            width: 100%;
            padding: 12px; 
            border-radius: 5px;
            transition: background-color 0.3s;
            margin-top: 20px; 
        }

        .btn-primary:hover {
            background-color: #607d8b;
        }

        .btn-info {
            background-color: #8d6e63;
            border: none;
            color: #ffffff;
            width: 100%;
            padding: 12px;
            border-radius: 5px;
            transition: background-color 0.3s;
            margin-top: 15px;
        }

        .btn-info:hover {
            background-color: #795548;
        }

        .form-check {
            margin-top: 20px;
            display: flex; 
            align-items: center; 
        }

        .form-check-input {
            margin-right: 10px; 
        }

        .text-center {
            text-align: center;
            margin-top: 20px; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form action="src/login.php" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>

            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="remember">
                <label class="form-check-label" for="remember">Lembrar</label>
            </div>

            <button type="submit" class="btn btn-primary">Login</button>

            <div class="text-center">
                <a href="src/form-add.php" class="btn btn-info">Cadastrar Usuário</a>
            </div>
        </form>
    </div>
</body>
</html>
