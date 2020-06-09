<?php
    include('includes/header.php');
?>

<br><br>
<h2 class="container">Rela de visita</h2>
<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">
            <?php
            $stmt = $conn->query("SELECT * FROM visita ORDER BY id desc");
            while ($row = $stmt->fetch()) :
                ?>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <p class="card-text">
                                <?=$row['nome']?><br>
                                <?=$row['fone']?><br>
                                <?=$row['email']?><br>
                                <?=$row['data']?>
                            </p>
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