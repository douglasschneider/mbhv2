<?php
    include('includes/header.php');
?>

<br><br>
<h2 class="container">Relação de agenda de visita</h2>
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


<h2 class="container">Relação de visualização ref produto</h2>
<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">
            <?php
            $hoje = date("Y-m-d");
            $stmt = $conn->query("SELECT 
            COUNT(*) AS visita, produto.nome as nome
        FROM
            produto_visita
            JOIN produto on produto.id = produto_visita.id_produto
        WHERE produto_visita.data = '" . date("Y-m-d") . "'
        GROUP BY produto_visita.id_produto
        ORDER BY visita desc;");
            while ($row = $stmt->fetch()) :
                ?>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <p class="card-text">
                                <?=$row['nome']?>
                                foi visualizado
                                <?=$row['visita']?>
                                <?php if ($row['visita'] > 1) {
                                    echo 'vezes';
                                } else {
                                    echo 'vez';
                                }
                                ?>
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