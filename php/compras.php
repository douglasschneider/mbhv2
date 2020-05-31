<?php
include('includes/header.php');

$carrinho = [];
$valorTotal = 0;

if ($_SESSION['carrinho']) {
    $ids = implode(',', $_SESSION['carrinho']);
    $stmt = $conn->query("SELECT * FROM produto WHERE id IN ({$ids})");

    while ($row = $stmt->fetch()) {
        $carrinho[] = [
            'id' => $row['id'],
            'nome' => $row['nome'],
            'valor' => $row['valor'],
        ];

        $valorTotal += $row['valor'];
    }
}

if (isset($_POST['nome'])) {
    $sqlUsuario = "INSERT INTO usuario (nome, telefone) VALUES (?, ?)";
    $stmtUsuario = $conn->prepare($sqlUsuario);
    $stmtUsuario->execute([$_POST['nome'], $_POST['telefone']]);
    $idUsuario = $conn->lastInsertId();

    $sqlPedido = "INSERT INTO pedido (id_usuario, valor_total) VALUES (?, ?)";
    $stmtPedido = $conn->prepare($sqlPedido);
    $stmtPedido->execute([$idUsuario, $valorTotal]);
    $idPedido = $conn->lastInsertId();

    $stmtItemPedido = $conn->prepare("INSERT INTO pedido_item (id_pedido, id_produto, valor) VALUES (?, ?, ?)");
    foreach ($carrinho as $item) {
        $stmtItemPedido->execute([$idPedido, $item['id'], $item['valor']]);
    }

    $_SESSION['carrinho'] = null;
    $conn->close;

    header('Location: index.php');
}
?>

<h1 class="mt-5">Meu Carrinho</h1>

<div class="album py-5 bg-light">
    <div class="container">
        <?php if ($carrinho) : ?>
            <form name="comprar" id="comprar" method="post" action="">
                <input type="text" name="nome" placeholder="Nome" />
                <br>
                <input type="text" name="telefone" placeholder="Telefone" />
                <br>
                <?php
                foreach ($carrinho as $item) {
                    echo '<input type="hidden" name="id_produto[]" value="' . $item['id'] . '"/>';
                    echo $item['nome'] . " - R$ " . $item['valor'] . "<br>";
                };

                echo 'Valor total: R$ ' . $valorTotal;
                ?>
                <br><br>
                <button type="submit" class="btn btn-sm btn-outline-secondary">Comprar</button>
            </form>
        <?php else : ?>
            Não há pedidos no carrinho!
        <?php endif; ?>
    </div>
</div>

<?php
include('includes/footer.php');
?>
