<?php
include 'conexao.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index pet shop</title>
</head>
<body>
    <div style= "align-items: center; display: flex; justify-content: center; height: 100vh;">
    <main style="display: flex;flex-direction: column; align-items: center; gap: 10px;">
        <h1>Bem-vindo ao Pet Shop</h1>
        <a href="cadastro_usuario.php" style="padding: 10px; background-color: #007bff; color: white; text-decoration: none;">Cadastrar Usuário</a>
        <a href="editar_usuario.php" style="padding: 10px; background-color: #28a745; color: white; text-decoration: none;">Editar Usuário</a>
        <a href="excluir_usuario.php" style="padding: 10px; background-color: #dc3545; color: white; text-decoration: none;">Excluir Usuário</a>
        <a href="cadastro_animal.php" style="padding: 10px; background-color: #ffc107; color: black; text-decoration: none;">Cadastrar Animal</a>
        <a href="editar_animal.php" style="padding: 10px; background-color: #17a2b8; color: white; text-decoration: none;">Editar Animal</a>
        <a href="excluir_animal.php" style="padding: 10px; background-color: #6c757d; color: white; text-decoration: none;">Excluir Animal</a>
    </main>
</div>