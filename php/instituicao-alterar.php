<?php
include('includes/header.php');

$stmt = $conn->query("SELECT * FROM instituicao WHERE id = " .  $_GET['id']);
$row = $stmt->fetch();

if (isset($_POST['id'])) {
    $image = null;
    if ($_FILES['imagem']) {
        $image = $_FILES['imagem']['name'];
        move_uploaded_file($_FILES['imagem']['tmp_name'], './img/instituicao/' . $image);
    }

    $sqlUsuario = "UPDATE instituicao SET nome = ?, imagem = ?, descricao = ? WHERE id = ?";
    $stmtUsuario = $conn->prepare($sqlUsuario);
    $stmtUsuario->execute([$_POST['nome'], $_POST['descricao'], $image, $_POST['id']]);

    $conn->close;
    header('Location: instituicao-alterar.php?id=' . $_POST['id']);
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
                <label for="valor">Imagem</label>
                <br>
                <input type="file" id="imagem" name="imagem"/>
            </div>

            <div class="form-group">
                <label for="valor">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" required step="any" value="<?=$row['descricao'] ?>" />
            </div>


            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</div>

<?php
include('includes/footer.php');
?>
