<?php
include "../infra/conexao.php";

if (!isset($_GET['id'])) {
    die("ID do cliente não informado.");
}
$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];

    $sql = "UPDATE cliente SET nome = ?, cpf = ? WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $nome, $cpf, $id);

    if ($stmt->execute()) {
        header("Location: ../index.php");
        exit;
    } else {
        echo "Erro ao atualizar o cliente.";
    }
}
$sql = "SELECT id, nome, cpf FROM cliente WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$resultado = $stmt->get_result();
$usuario = $resultado->fetch_assoc();

if (!$usuario) {
    die("Cliente não encontrado.");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Editar Cliente</title>
</head>

<body>

    <h1>Editar Cliente</h1>

    <form method="POST">

        <label for="nome">Nome:</label>

        <input
            type="text"
            name="nome"
            id="nome"
            value="<?php echo htmlspecialchars($usuario['nome']); ?>"
            required
        >

        <br>

        <label for="cpf">CPF:</label>

        <input
            type="text"
            name="cpf"
            id="cpf"
            value="<?php echo htmlspecialchars($usuario['cpf']); ?>"
            required
        >

        <br>

        <button type="submit">
            Salvar
        </button>

    </form>

</body>

</html>