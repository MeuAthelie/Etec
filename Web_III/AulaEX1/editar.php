<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta o registro com base no ID
    $sql = "SELECT * FROM produtos WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nome = $row['nome'];
        $preco = $row['preco'];
        $quantidade = $row['quantidade'];

        // Exibe o formulário de edição
        echo "
        <form method='POST' action='salvar_edicao.php'>
            <input type='hidden' name='id' value='$id'>
            Nome: <input type='text' name='nome' value='$nome'><br>
            Preço: <input type='text' name='preco' value='$preco'><br>
            Quantidade: <input type='number' name='quantidade' value='$quantidade'><br>
            <input type='submit' value='Salvar Alterações'>
        </form>";
    } else {
        echo "Produto não encontrado.";
    }
} else {
    echo "ID do produto não especificado.";
}


