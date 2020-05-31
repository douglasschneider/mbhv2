<?php
include('includes/header.php');
?>
<h1 class="mt-5">Produto</h1>

<a class="btn btn-success" href="produto-novo.php">Novo Produto</a>

<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th scope="col">Código</th>
            <th scope="col">Nome</th>
            <th scope="col">Valor</th>
            <th scope="col">Ação</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stmt = $conn->query("SELECT * FROM produto");

        while ($row = $stmt->fetch()) {
            ?>
            <tr>
                <th scope="row">
                    <?=$row['id']?>
                </th>
                <td>
                    <?=$row['nome']?>
                </td>
                <td>
                    <?=$row['valor']?>
                </td>
                <td>
                    <a href="produto-visualizar.php?id=<?=$row['id']?>">Visualizar</a>
                    <a href="produto-alterar.php?id=<?=$row['id']?>">Alterar</a>
                    <a href="produto-remover.php?id=<?=$row['id']?>">Remover</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>

<?php
include('includes/footer.php');
?>
