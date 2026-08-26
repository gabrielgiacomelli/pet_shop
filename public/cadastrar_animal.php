<?php
include '../infra/conexao.php';

$cliente = mysqli_query($conn, "SELECT * FROM cliente");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = $_POST["nome"];
    $especie = $_POST["especie"];
    $peso = $_POST["peso"];
    $id_cliente = $_POST["cliente_id"];

    $sql = "INSERT INTO animais (nome, especie, peso, id_cliente) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdi", $nome, $especie, $peso, $id_cliente);

    $stmt->execute();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Animal</title>
</head>

<body>

<header style="padding: 15px;">
    <nav style="display: flex; justify-content: center; gap: 20px;">
        <a href="../index.php" style="color: black; text-decoration: none;">Página inicial</a>
        <a href="cadastrar_usuario.php" style="color: black; text-decoration: none;">Cadastrar Usuario</a>
    </nav>
</header>

<div style="display: flex; flex-direction: column; gap: 10px;">

    <h1>Cadastrar Animal</h1>

    <form method="POST">

        <label for="nome">Nome:</label>
        <input
            type="text"
            id="nome"
            placeholder="Digite o nome do animal:"
            name="nome"
            required
        >

        <br>

        <label for="especie">Espécie:</label>
        <input
            type="text"
            id="especie"
            placeholder="Digite a espécie:"
            name="especie"
            required
        >

        <br>

        <label for="peso">Peso:</label>
        <input
            type="number"
            step="0.01"
            id="peso"
            placeholder="Digite o peso:"
            name="peso"
            required
        >

        <br>

        <select name="cliente_id" id="cliente_id" required>

            <option value="">
                Selecione o Dono do Animal...
            </option>

            <?php
            while ($user_option = mysqli_fetch_assoc($cliente)):
            ?>

                <option value="<?php echo $user_option['id']; ?>">
                    <?php echo htmlspecialchars($user_option['nome']); ?>
                </option>

            <?php endwhile; ?>

        </select>

        <br>

        <button type="submit">Cadastrar</button>

    </form>

</div>

</body>
</html>