<?php
include('includes/header.php');

$stmt = $conn->query("SELECT * FROM produto WHERE id = " .  $_GET['id']);
$row = $stmt->fetch();

if (isset($_POST['id'])) {
    $image = null;
    if ($_FILES['imagem']) {
        $image = $_FILES['imagem']['name'];
        move_uploaded_file($_FILES['imagem']['tmp_name'], './img/produtos/' . $image);
    }

    $sqlUsuario = "UPDATE produto SET nome = ?, valor = ?, imagem = ? WHERE id = ?";
    $stmtUsuario = $conn->prepare($sqlUsuario);
    $stmtUsuario->execute([$_POST['nome'], $_POST['valor'], $image, $_POST['id']]);

    $conn->close;
    header('Location: produto-visualizar.php?id=' . $_POST['id']);
}
?>

<h1 class="mt-5">Alterar produto <?=$row['id'] ?></h1>

<div class="album py-5 bg-light">
    <div class="container">
        <form name="novo-produto" id="novo-produto" method="post" action="" enctype="multipart/form-data">
            <input type="hidden" id="id" name="id" value="<?=$row['id'] ?>">

            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required minlength="3" value="<?=$row['nome'] ?>" />
            </div>

            <div class="form-group">
                <label for="valor">Valor</label>
                <input type="number" class="form-control" id="valor" name="valor" required step="any" value="<?=$row['valor'] ?>" />
            </div>

            <div class="form-group">
                <label for="valor">Imagem</label>
                <br>
                <input type="file" id="imagem" name="imagem"/>
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</div>

<?php
include('includes/footer.php');
?>
