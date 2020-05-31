<?php
include('includes/header.php');

if (isset($_POST['id'])) {
    $_SESSION['carrinho'][$_POST['id']] = $_POST['id'];
}
?>

<h1 class="mt-5">Produtos a venda</h1>

<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">
            <?php
            $stmt = $conn->query("SELECT * FROM produto ORDER BY id desc");
            while ($row = $stmt->fetch()) :
                ?>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <?php if (!$row['imagem']) : ?>
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
                                <title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c"/>
                                <text x="50%" y="50%" fill="#eceeef" dy=".3em"><?=$row['nome'] ?></text>
                            </svg>
                        <?php else : ?>
                            <img src="./img/produtos/<?=$row['imagem']?>" width="100%" height="225">
                        <?php endif; ?>

                        <div class="card-body">
                            <p class="card-text">
                                <?=$row['nome']?>
                            </p>
                            <p class="card-text">
                                R$ <?=$row['valor']?>
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <form name="add" id="add" method="post" action="">
                                        <input type="hidden" name="id" value="<?=$row['id']?>"/>
                                        <button type="submit" class="btn btn-sm btn-outline-secondary">Comprar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
?>