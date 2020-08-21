<?php

require_once "inicia.php";

$id = isset($_GET['id']) ? $_GET['id'] : null;

if (empty($id)) {
    echo "ID do pedido não informado!";
    exit;
}

$PDO = conecta_bd();
$stmt = $PDO->prepare("SELECT nome, endereco, bairro, municipio, fone, cpf, 
    pagamento, quantidade1, descricao1, valor1, quantidade2, descricao2, 
    valor2, quantidade3, descricao3, valor3, quantidade4, descricao4, valor4, 
    quantidade5, descricao5, valor5 FROM pedidos WHERE id = :id");

$stmt->bindParam(":id", $id);
$stmt->execute();
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

if (!is_array($resultado)) {
    echo "Nenhum pedido encontrado com esse ID";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impressão Rivito</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Rivito Móveis</h2>
        <span></span>
    </div>
</body>
</html>