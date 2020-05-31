<?php
include('includes/connection.php');

if ($_GET['id']) {
    try {
        $sql = "DELETE FROM produto WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$_GET['id']]);
    } catch(Exception $e) {
        echo 'Produto não pode ser deletado';exit;
    }
}

header('Location: produto.php');
?>

