<?php
include('includes/header.php');

$stmt = $conn->query("SELECT * FROM produto WHERE id = " .  $_GET['id']);
$row = $stmt->fetch();
?>

<h1 class="mt-5">Produto <?=$row['id']?></h1>

<ul>
    <li>
        Código: <?=$row['id']?>
    </li>
    <li>
        Nome: <?=$row['nome']?>
    </li>
    <li>
        Valor: <?=$row['valor']?>
    </li>
    <li>
        Imagem:
        <br>
        <img src="./img/produtos/<?=$row['imagem']?>" width="200" height="200">
    </li>
</ul>

<a class="btn btn-secondary" href="produto.php">Voltar</a>
<a class="btn btn-primary" href="produto-alterar.php?id=<?=$row['id']?>">Alterar</a>
<a class="btn btn-danger" href="produto-remover.php?id=<?=$row['id']?>">Remover</a>

<?php
include('includes/footer.php');
?>
