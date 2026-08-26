<?php
include "../infra/conexao.php";

// PEGA O ID DO ANIMAL
if (!isset($_GET['id'])) {
    die("ID do animal não informado.");
}

$id = $_GET['id'];


// QUANDO O FORMULÁRIO FOR ENVIADO
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = $_POST['nome'];
    $especie = $_POST['especie'];
    $peso = $_POST['peso'];
    $id_cliente = $_POST['cliente_id'];

    $sql = "UPDATE animais 
            SET nome = ?, especie = ?, peso = ?, id_cliente = ? 
            WHERE id = ?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "ssdii",
        $nome,
        $especie,
        $peso,
        $id_cliente,
        $id
    );

    $stmt->execute();

    header("Location: ../index.php");
    exit;
}


// BUSCA OS DADOS DO ANIMAL
$sql = "SELECT * FROM animais WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$resultado = $stmt->get_result();
$animal = $resultado->fetch_assoc();

if (!$animal) {
    die("Animal não encontrado.");
}


// BUSCA TODOS OS CLIENTES
$clientes = $conn->query("SELECT * FROM cliente");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Editar Animal</title>
</head>

<body>

    <header style="padding: 15px;">
        <nav style="display: flex; justify-content: center; gap: 20px;">

            <a href="../index.php"
               style="color: black; text-decoration: none;">
                Página Inicial
            </a>

        </nav>
    </header>


    <div style="display: flex; flex-direction: column; gap: 10px;">

        <h1>Editar Animal</h1>


        <form method="POST">

            <label for="nome">
                Nome:
            </label>

            <input
                type="text"
                id="nome"
                name="nome"
                value="<?php echo htmlspecialchars($animal['nome']); ?>"
                required
            >

            <br>


            <label for="especie">
                Espécie:
            </label>

            <input
                type="text"
                id="especie"
                name="especie"
                value="<?php echo htmlspecialchars($animal['especie']); ?>"
                required
            >

            <br>


            <label for="peso">
                Peso:
            </label>

            <input
                type="number"
                step="0.01"
                id="peso"
                name="peso"
                value="<?php echo $animal['peso']; ?>"
                required
            >

            <br>


            <label for="cliente_id">
                Dono do Animal:
            </label>

            <select name="cliente_id" id="cliente_id" required>

                <?php while ($cliente = $clientes->fetch_assoc()) { ?>

                    <option
                        value="<?php echo $cliente['id']; ?>"

                        <?php
                        if ($cliente['id'] == $animal['id_cliente']) {
                            echo "selected";
                        }
                        ?>
                    >

                        <?php echo htmlspecialchars($cliente['nome']); ?>

                    </option>

                <?php } ?>

            </select>

            <br>


            <button type="submit">
                Salvar
            </button>

        </form>

    </div>

</body>
</html>