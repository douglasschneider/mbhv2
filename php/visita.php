<?php
    include('includes/header.php');
?>

<center>
    <h1 class="mt-5">Agendar Visita</h1>
    <p>Após agendar nós entraremos em contato.</p>
    
    <form method="post">
        <label>Nome: </label>
        <input type="text" name="nome" required style="width: 600px;"><br>

        <label>Fone: </label>
        <input type="tel" name="fone"  required style="width: 594px;"><br>


        <label>Email: </label>
        <input type="text" name="email" required style="width: 594px;"><br>

        <label>Data: </label>
        <input type="date"  name="dia" value="2020-06-10" min="2020-06-10" max="2020-12-01"><br>

        <button class="btn btn-primary" name="enviar" type="submit">Agendar</button>
    </form>
</center>

<?php
    if(isset($_POST['enviar'])) {
        $sqlVisita = "INSERT INTO visita (nome ,fone, email, data) VALUES (?, ?, ?, ?)";
        $stmtVisita = $conn->prepare($sqlVisita);
        $stmtVisita->execute([$_POST['nome'], $_POST['fone'], $_POST['email'], $_POST['dia']]);
        $idVisita = $conn->lastInsertId();
    }
?>

<?php
    include('includes/footer.php');
?>
