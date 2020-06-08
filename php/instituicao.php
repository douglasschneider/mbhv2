<?php
    include('includes/header.php');
?>

<center>
    <br>
    <h1 class="mt-5">Nossas Instituições</h1>
</center>

<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">
            <?php
            $stmt = $conn->query("SELECT * FROM instituicao ORDER BY id");
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
                            <img src="./img/instituicao/<?=$row['imagem']?>" width="100%" height="225">
                        <?php endif; ?>

                        <div class="card-body">
                            <p class="card-text">
                                <?=$row['nome']?>
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <form name="add" id="add" method="post" action="instituicao-visualizar.php?id=<?=$row['id']?>">
                                        <input type="hidden" name="id" value="<?=$row['id']?>"/>
                                        <button type="submit" class="btn btn-sm btn-outline-secondary">Detalhes</button>
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