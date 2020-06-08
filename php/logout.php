<?php
include('includes/connection.php');

unset($_SESSION['usuarioLogado']);
header('Location: index.php');