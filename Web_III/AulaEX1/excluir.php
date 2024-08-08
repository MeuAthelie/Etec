<?php
include 'db.php';

// Verifica se o ID do produto foi passado via GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM produtos WHERE id = $id";

    $conn->query($sql);

} else {
    echo "ID do produto não especificado.";
}


header("Location: index.php");
?>
