<?php
require 'App/Classes/Produto.php';
$produto = new Produto();
$produto = $produto->listar();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Pages/Css/estilo_index.css">
    <title>Lista de Produtos</title>
</head>
<body>
    <h1>Lista de produtos</h1>


    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>preco</th>
                <th>descricao</th>
                <th>imagem</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produto as $produto) { ?>
                <tr>
                    <td><?php echo $produto['id_produto']; ?></td>
                    <td><?php echo $produto['preco']; ?></td>
                    <td><?php echo $produto['descrocao']; ?></td>
                    <td><?php echo $produto['imagem']; ?></td>

                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>