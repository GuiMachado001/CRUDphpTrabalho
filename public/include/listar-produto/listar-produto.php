<?php
$produto = new Produto();
$produto = $produto->listar();

?>

<div class="containerTabelaProdutos">

    <h1>Lista de produtos</h1>
    
    
    <table >
        <thead>
            <tr>
                <th>ID produto</th>
                <th>Nome do Produto</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($produto as $produtos) { ?>
                <tr>
                    <td><?php echo $produtos['id_produto']; ?></td>
                    <td><?php echo $produtos['nome']; ?></td>
                    <td>
                    <a href="editar-produto.php?id_produto=<?php echo $produtos['id_produto']; ?>">Editar</a>
                    <a href="deletar-produto.php?id_produto=<?php echo $produtos['id_produto']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        
    </div>