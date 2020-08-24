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
    <div class="jumbotron">
        <h1 class="display-4">Rivito Móveis</h1>
        <p class="lead">Aplicação para controle de pedidos</p>
        <a class="btn btn-primary btn-lg mb-3" href="novoPedido.html" role="button">Novo Pedido</a><br>
            <hr class="my-4">
            <div class="main">
                <h1>Pedidos:</h1>
                <?php
                $stmt_count = $PDO->prepare("SELECT COUNT(*) AS total FROM pedidos");
                $stmt_count->execute();
                $stmt = $PDO->prepare("SELECT id, nome, fone, pagamento, quantidade1,
                quantidade2, quantidade3, quantidade4, quantidade5, valor1, valor2, 
                valor3, valor4, valor5, frete, montagem from pedidos ORDER BY id");
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
                                <td>R$ <?php echo 
                            ($resultado['valor1'] * $resultado['quantidade1']) +
                            ($resultado['valor2'] * $resultado['quantidade2']) + 
                            ($resultado['valor3'] * $resultado['quantidade3']) + 
                            ($resultado['valor4'] * $resultado['quantidade4']) +
                            ($resultado['valor5'] * $resultado['quantidade5']) +
                            $resultado['frete'] + $resultado['montagem'] ?></td>
                                <td>
                                    <a href="imprime.php?id=<?php echo $resultado['id'] ?>">Imprimir</a>
                                    <a href="form_altera.php?id=<?php echo $resultado['id'] ?>">Alterar</a>
                                    <a href="exclui.php?id=<?php echo $resultado['id'] ?>" 
                                        onclick="return confirm('Tem certeza que deseja excluir este pedido? (Ação não poderá ser desfeita)')">Excluir</a>
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
        
			<hr class="my-4">
			<p>Criado por: <strong> Lenin Ribeiro Quadros </strong></p>
		</div>
</body>
</html>