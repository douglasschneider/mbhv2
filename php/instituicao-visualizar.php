<?php
include('includes/header.php');

$stmt = $conn->query("SELECT * FROM instituicao WHERE id = " .  $_GET['id']);
$row = $stmt->fetch();
?>

<h1 class="mt-5">Instituicao <?=$row['nome']?></h1>

<ul>
    <li>
        Descrição: <?=$row['descricao']?>
    </li>
    <li>
        Logo:
        <br>
        <img src="./img/instituicao/<?=$row['imagem']?>" width="300" height="200">
    </li>
</ul>

<a class="btn btn-secondary" href="index.php">Voltar</a>
<!--
    <a class="btn btn-primary" href="produto-alterar.php?id=<?=$row['id']?>">Alterar</a>
    <a class="btn btn-danger" href="produto-remover.php?id=<?=$row['id']?>">Remover</a>
-->

<?php
    include('includes/footer.php');
?>
