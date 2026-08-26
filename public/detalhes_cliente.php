<?php
include "../infra/conexao.php";

if (!isset($_GET['id'])) {
    die("ID do cliente não informado.");
}

$id = $_GET['id'];


// BUSCA O CLIENTE
$sql = "SELECT * FROM cliente WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$resultado = $stmt->get_result();
$cliente = $resultado->fetch_assoc();

if (!$cliente) {
    die("Cliente não encontrado.");
}


// BUSCA OS ANIMAIS
$sql_animais = "SELECT * FROM animais WHERE id_cliente = ?";

$stmt_animais = $conn->prepare($sql_animais);
$stmt_animais->bind_param("i", $id);
$stmt_animais->execute();

$animais = $stmt_animais->get_result();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Detalhes do Cliente</title>
</head>

<body>

    <a href="../index.php">Voltar</a>

    <h1>Detalhes do Cliente</h1>

    <h2>Dados</h2>

    <p>
        <strong>Nome:</strong>
        <?php echo $cliente['nome']; ?>
    </p>

    <p>
        <strong>CPF:</strong>
        <?php echo $cliente['CPF']; ?>
    </p>


    <h2>Animais</h2>

    <?php if ($animais->num_rows > 0) { ?>

        <table border="1">

            <tr>
                <th>Nome</th>
                <th>Espécie</th>
                <th>Peso</th>
            </tr>

            <?php while ($animal = $animais->fetch_assoc()) { ?>

                <tr>
                    <td><?php echo $animal['nome']; ?></td>
                    <td><?php echo $animal['especie']; ?></td>
                    <td><?php echo $animal['peso']; ?> kg</td>
                </tr>

            <?php } ?>

        </table>

    <?php } else { ?>

        <p>Este cliente não possui animais cadastrados.</p>

    <?php } ?>

</body>

</html>