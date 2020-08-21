<?php

require_once "inicia.php";
$PDO = conecta_bd();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Rivito Moveis</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
	<header class="header">
        <div class="logo"><h2>Rivito Móveis</h2></div>
        <a href="index.html">Inicio</a>
	</header>
	<div class="main">
        <h1>Pedidos:</h1>
        <?php
        $stmt_count = $PDO->prepare("SELECT COUNT(*) AS total FROM pedidos");
        $stmt_count->execute();
        $stmt = $PDO->prepare("SELECT id, nome, fone, pagamento, valor1, valor2, valor3, valor4, valor5 from pedidos ORDER BY id");
        $stmt->execute();
        $total = $stmt_count->fetchColumn();

        if($total > 0) :
        ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Pedido</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Pagamento</th>
                    <th scope="col">Valor Total</th>
                    <th scope="col">Opções</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                    <tr>
                        <th  scope="col"><?php echo $resultado['id'] ?></th>
                        <td><?php echo $resultado['nome'] ?></td>
                        <td><?php echo $resultado['fone'] ?></td>
                        <td><?php echo $resultado['pagamento'] ?></td>
                        <td>R$ <?php echo $resultado['valor1'] + $resultado['valor2'] + $resultado['valor3'] + $resultado['valor4'] + $resultado['valor5'] ?></td>
                        <td>
                            <a href="imprime.php?id=<?php echo $resultado['id'] ?>">Imprimir</a>
                            <a href="form_altera.php?id=<?php echo $resultado['id'] ?>">Alterar</a>
                            <a href="exclui.php?id=<?php echo $resultado['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir este pedido? (Ação não poderá ser desfeita)')">Excluir</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <p>Total de pedidos: <?php echo $total ?></p>
        <?php else: ?>
            <p>Não há pedidos cadastrados.</p>
        <?php endif; ?>
	</div>
</body>
</html>