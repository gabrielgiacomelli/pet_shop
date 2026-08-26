<?php
include '../infra/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$nome = $_POST["nome"];
$cpf = $_POST["cpf"];

$sql = "INSERT INTO cliente (nome, cpf) VALUES (?, ?)";
 $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $nome, $cpf);

    $stmt->execute();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuário</title>
</head>
<body>
    <header style="padding: 15px;">
    <nav style="display: flex; justify-content: center; gap: 20px;">
        <a href="../index.php" style="color: black; text-decoration: none;">Página Inicial</a>
        <a href="cadastrar_animal.php" style="color: black; text-decoration: none;">Cadastrar Animal</a>
    </nav>
</header>
    <div style="display: flex; flex-direction: column; gap: 10px;">
        <h1>Cadastrar Cliente</h1>
        <form method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" placeholder="Digite seu Nome:" name="nome" required> <br>
    
            <label for="cpf">CPF:</label>
            <input type="text" placeholder="Digite seu CPF:" id="cpf" name="cpf" required><br>

            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>