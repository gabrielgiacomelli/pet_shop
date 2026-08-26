<?php
include "../infra/conexao.php";

// VERIFICA SE O ID FOI INFORMADO
if (!isset($_GET['id'])) {
    die("ID do cliente não informado.");
}

$id = $_GET['id'];


// BUSCA OS DADOS DO CLIENTE
$sql = "SELECT * FROM cliente WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$resultado = $stmt->get_result();
$cliente = $resultado->fetch_assoc();


// VERIFICA SE O CLIENTE EXISTE
if (!$cliente) {
    die("Cliente não encontrado.");
}


// BUSCA OS ANIMAIS DO CLIENTE
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detalhes do Cliente</title>
</head>

<body>

    <header>

        <a href="../index.php">
            Voltar
        </a>

    </header>


    <h1>Detalhes do Cliente</h1>


    <h2>Dados do Cliente</h2>

    <p>
        <strong>ID:</strong>
        <?php echo $cliente['id']; ?>
    </p>

    <p>
        <strong>Nome:</strong>
        <?php echo htmlspecialchars($cliente['nome']); ?>
    </p>

    <p>
        <strong>CPF:</strong>
        <?php echo htmlspecialchars($cliente['CPF']); ?>
    </p>


    <h2>Animais do Cliente</h2>


    <?php if ($animais->num_rows > 0) { ?>

        <table border="1">

            <tr>
                <th>Nome</th>
                <th>Espécie</th>
                <th>Peso</th>
            </tr>


            <?php while ($animal = $animais->fetch_assoc()) { ?>

                <tr>

                    <td>
                        <?php echo htmlspecialchars($animal['nome']); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($animal['especie']); ?>
                    </td>

                    <td>
                        <?php echo $animal['peso']; ?> kg
                    </td>

                </tr>

            <?php } ?>

        </table>

    <?php } else { ?>

        <p>
            Este cliente não possui animais cadastrados.
        </p>

    <?php } ?>


</body>

</html>