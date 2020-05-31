<?php
include('includes/header.php');


if (isset($_POST['nome'])) {
    $image = null;
    if ($_FILES['imagem']) {
        $image = $_FILES['imagem']['name'];
        $file = './img/produtos/' . $image;
        move_uploaded_file($_FILES['imagem']['tmp_name'], $file);
        chmod($file , 0777);
    }

    $sqlUsuario = "INSERT INTO produto (nome, valor, imagem) VALUES (?, ?, ?)";
    $stmtUsuario = $conn->prepare($sqlUsuario);
    $stmtUsuario->execute([$_POST['nome'], $_POST['valor'], $image]);

    $id = $conn->lastInsertId();

    $conn->close;
    header('Location: produto-visualizar.php?id=' . $id);
}
?>

<h1 class="mt-5">Novo produto</h1>
<div class="album py-5 bg-light">
    <div class="container">
        <form name="novo-produto" id="novo-produto" method="post" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required minlength="3" />
            </div>

            <div class="form-group">
                <label for="valor">Valor</label>
                <input type="number" class="form-control" id="valor" name="valor" required step="any" />
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
