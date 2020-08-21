<?php
require_once "inicia.php";

$id = isset($_GET['id']) ? $_GET['id'] : null;

if (empty($id)) {
    echo "O numero do pedido não foi definido.";
    exit;
}


$PDO = conecta_bd();
$sql = "DELETE FROM pedidos WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(":id", $id);

if ($stmt->execute()) {
    header("Location: consultaPedido.php");
} else {
    echo "Ocorreu um erro ao excluir o pedido";
    print_r($stmt->errorInfo());
}