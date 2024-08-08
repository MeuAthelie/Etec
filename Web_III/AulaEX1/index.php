<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Estoque</title>
</head>
<body>
    <h1>Cadastro de Produtos</h1>
    <form method="POST" action="adicionar.php">
        Nome: <input type="text" name="nome" required><br>
        Preço: <input type="text" name="preco" required><br>
        Quantidade: <input type="number" name="quantidade" required><br>
        <input type="submit" value="Adicionar Produto">
    </form>

    <h2>Lista de Produtos</h2>
    <table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Preço</th>
        <th>Quantidade</th>
        <th>Ações</th> <!-- Nova coluna para os botões -->
    </tr>
    <?php
    $sql = "SELECT * FROM produtos";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"]. "</td>";
            echo "<td>" . $row["nome"]. "</td>";
            echo "<td>" . $row["preco"]. "</td>";
            echo "<td>" . $row["quantidade"]. "</td>";
            echo "<td>";
            echo "<a href='editar.php?id=" . $row["id"] . "'>Editar</a>"; // Link para a página de edição
            echo " | ";
            echo "<form method='GET' action='excluir.php'><a href='excluir.php?id=" . $row["id"] . "'>Excluir</a></form>"; // Link para a página de exclusão
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Nenhum produto encontrado</td></tr>";
    }
    ?>
</table>
</body>
</html>
