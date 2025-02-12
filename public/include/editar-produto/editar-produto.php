<?php
require './App/Classes/Produto.php';

if (!isset($_GET['id_produto'])) {
    die('Produto não encontrado.');
}

$id_produto = $_GET['id_produto'];

$produto = new Produto();
$produto_prod = $produto->buscar($id_produto);

if (!$produto_prod) {
    die('Produto não encontrado.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];

    $produto->atualizar($id_produto, $nome);

    header('Location: areaprivada.php');
    exit();
}

?>

<h1>Editar produto</h1>
<form class="formEditarProduto" action="editar-produto.php?id_produto=<?php echo $id_produto; ?>" method="POST">
    <div class="containerEditarProduto">
        <label>Nome: </label>
        <input class="inputEditarProduto" type="text" name="nome" value="<?php echo htmlspecialchars($produto_prod['nome']); ?>" required><br>
    </div>    

    <button class="btnEditar" type="submit">Atualizar</button>
</form>
<br>
<a href="areaprivada.php" class="voltarLista">Voltar para a lista de produtos</a>
