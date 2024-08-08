<?php
include 'db.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$preco = $_POST['preco'];
$quantidade = $_POST['quantidade'];

$sql = "update produtos  set  nome = '$nome', preco ='$preco', quantidade ='$quantidade' where id = '$id'";

if ($conn->query($sql) === TRUE) {
    echo "Novo produto adicionado com sucesso";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: index.php");
?>