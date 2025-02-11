<?php
require './App/Classes/Produto.php';
// require './App/DB/Database.php';

if (!isset($_GET['id_produto'])) {
    die('Produto não encontrado.');
}

$id_produto = $_GET['id_produto'];

// Verifica se o id do produto é válido antes de tentar deletar
if (is_numeric($id_produto)) {
    $produto = new Produto();
    $produto->deletar($id_produto);

    // Redireciona de volta à área privada ou à página de listagem
    header('Location: areaprivada.php');
    exit();
} else {
    die('ID inválido.');
}
