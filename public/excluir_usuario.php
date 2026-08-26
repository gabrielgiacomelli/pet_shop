<?php
include "../infra/conexao.php";

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql_verificar = "SELECT COUNT(*) AS quantidade 
                      FROM animais 
                      WHERE id_cliente = ?";

    $stmt_verificar = $conn->prepare($sql_verificar);
    $stmt_verificar->bind_param("i", $id);
    $stmt_verificar->execute();

    $resultado = $stmt_verificar->get_result();
    $dados = $resultado->fetch_assoc();

    if ($dados['quantidade'] > 0) {

        echo "Não é possível excluir este cliente porque ele possui animais cadastrados.";

        echo "<br><br>";

        echo "<a href='../index.php'>Voltar</a>";

        exit;
    }


    $sql = "DELETE FROM cliente WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    $stmt->execute();

    header("Location: ../index.php");
    exit;
}
?>