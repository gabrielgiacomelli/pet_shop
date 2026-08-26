<?php
include 'infra/conexao.php';

$resultado = $conn->query("SELECT * FROM cliente");

$resultado_animais = $conn->query("
    SELECT animais.id, animais.nome, animais.especie, animais.peso, cliente.nome AS dono
    FROM animais
    INNER JOIN cliente ON animais.id_cliente = cliente.id
");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Pet Shop</title>
</head>

<body>

<header style="padding: 15px;">
    <nav style="display: flex; justify-content: center; gap: 20px;">
        <a href="public/cadastrar_usuario.php" style="color: black; text-decoration: none;">
            Cadastrar Usuário
        </a>

        <a href="public/cadastrar_animal.php" style="color: black; text-decoration: none;">
            Cadastrar Animal
        </a>
    </nav>
</header>

<main>

    <h2>Clientes Cadastrados</h2>

    <table border="1">

        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Ações</th>
        </tr>

        <?php while ($cliente = $resultado->fetch_assoc()) { ?>

            <tr>
                <td><?php echo $cliente['id']; ?></td>
                <td><?php echo $cliente['nome']; ?></td>
                <td><?php echo $cliente['CPF']; ?></td>

                <td>
                    <a href="public/editar_usuario.php?id=<?php echo $cliente['id']; ?>">
                        Editar
                    </a>

                <a href="public/excluir_usuario.php?id=<?php echo $cliente['id']; ?>">
    Excluir
</a>
                </td>
            </tr>

        <?php } ?>

    </table>


    <h2>Animais Cadastrados</h2>

    <table border="1">

        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Espécie</th>
            <th>Peso</th>
            <th>Dono</th>
            <th>Ações</th>
        </tr>

        <?php while ($animal = $resultado_animais->fetch_assoc()) { ?>

            <tr>
                <td><?php echo $animal['id']; ?></td>
                <td><?php echo $animal['nome']; ?></td>
                <td><?php echo $animal['especie']; ?></td>
                <td><?php echo $animal['peso']; ?> kg</td>
                <td><?php echo $animal['dono']; ?></td>

                <td>
                    <a href="public/visualizar.php?id=<?php echo $cliente['id']; ?>">
    Visualizar
</a>
                    <a href="public/editar_animal.php?id=<?php echo $animal['id']; ?>">
                        Editar
                    </a>

                    <a href="public/excluir_animal.php?id=<?php echo $animal['id']; ?>">
                        Excluir
                    </a>
                </td>
            </tr>

        <?php } ?>

    </table>

</main>

</body>
</html>