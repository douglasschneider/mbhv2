<?php
include('includes/header.php');
?>

<h1 class="mt-5">Pedidos</h1>

<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th scope="col">Código</th>
            <th scope="col">Comprador</th>
            <th scope="col">Valor Total</th>
<!--            <th scope="col">Ação</th>-->
        </tr>
    </thead>
    <tbody>
        <?php
        $stmt = $conn->query("
            SELECT 
                p.id, p.valor_total,
                u.nome
            FROM 
                pedido p
                INNER JOIN usuario u ON u.id = p.id_usuario
            ORDER BY
                p.id DESC
        ");

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
                    <?=$row['valor_total']?>
                </td>
<!--                <td>-->
<!--                    <a href="pedido-visualizar.php?id=--><?//=$row['id']?><!--">Visualizar</a>-->
<!--                </td>-->
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>

<?php
include('includes/footer.php');
?>
