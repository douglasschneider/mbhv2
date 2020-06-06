<?php
include('connection.php');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Museu da Computação  - UNOESC</title>
    <link href="https://getbootstrap.com/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="img/unoesc.ico" rel="icon">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="index.php"><img width="55px" height="55px" src="img/unoesc.png">Museu da Computação</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="produto.php">Produto</a>
                    </li>
                    <!--
                        <li class="nav-item">
                            <a class="nav-link" href="pedido.php">Pedidos</a>
                        </li>
                    -->
                    </ul>
                    
                <form class="form-inline mt-2 mt-md-0">
                    <?php if (isset($_SESSION['carrinho']) && $_SESSION['carrinho']) : ?>
                        <a class="btn btn-outline-success my-2 my-sm-0" href="compras.php">Meu carrinho (<?= $_SESSION['carrinho'] ? count($_SESSION['carrinho']) : 0?>)</a>
                    <?php endif; ?>
                </form>
            </div>
        </nav>
    </header>

    <main role="main">
<br>
<br>

