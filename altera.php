<?php
require_once "inicia.php";

$id = isset($_POST['id']) ? $_POST['id'] : null;
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$endereco = isset($_POST['endereco']) ? $_POST['endereco'] : null;
$bairro = isset($_POST['bairro']) ? $_POST['bairro'] : null;
$municipio = isset($_POST['municipio']) ? $_POST['municipio'] : null;
$fone = isset($_POST['fone']) ? $_POST['fone'] : null;
$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : null;
$pagamento = $_POST['pagamento'];

$quantidade1 = isset($_POST['quantidade1']) ? $_POST['quantidade1'] : null;
$descricao1 = isset($_POST['descricao1']) ? $_POST['descricao1'] : null;
$valor1 = isset($_POST['valor1']) ? $_POST['valor1'] : 0;
$quantidade2 = isset($_POST['quantidade2']) ? $_POST['quantidade2'] : null;
$descricao2 = isset($_POST['descricao2']) ? $_POST['descricao2'] : null;
$valor2 = isset($_POST['valor2']) ? $_POST['valor2'] : 0;
$quantidade3 = isset($_POST['quantidade3']) ? $_POST['quantidade3'] : null;
$descricao3 = isset($_POST['descricao3']) ? $_POST['descricao3'] : null;
$valor3 = isset($_POST['valor3']) ? $_POST['valor3'] : 0;
$quantidade4 = isset($_POST['quantidade4']) ? $_POST['quantidade4'] : null;
$descricao4 = isset($_POST['descricao4']) ? $_POST['descricao4'] : null;
$valor4 = isset($_POST['valor4']) ? $_POST['valor4'] : 0;
$quantidade5 = isset($_POST['quantidade5']) ? $_POST['quantidade5'] : null;
$descricao5 = isset($_POST['descricao5']) ? $_POST['descricao5'] : null;
$valor5 = isset($_POST['valor5']) ? $_POST['valor5'] : 0;

if (empty($id) || empty($nome) || empty($endereco) || empty($bairro) || empty($municipio) || empty($fone) || empty($cpf) || empty($pagamento)) {
    echo "É preciso preencher todos os campos do cadastro do cliente!";
    exit;
}

$PDO = conecta_bd();

$stmt = $PDO->prepare("UPDATE pedidos SET nome = :nome, endereco = :endereco, 
    bairro = :bairro, municipio = :municipio, fone = :fone, cpf = :cpf,
    pagamento = :pagamento, quantidade1 = :quantidade1, descricao1 = :descricao1,
    valor1 = :valor1, quantidade2 = :quantidade2, descricao2 = :descricao2,
    valor2 = :valor2, quantidade3 = :quantidade3, descricao3 = :descricao3,
    valor3 = :valor3, quantidade4 = :quantidade4, descricao4 = :descricao4,
    valor4 = :valor4, quantidade5 = :quantidade5, descricao5 = :descricao5,
    valor5 = :valor5 where id = :id");

$stmt->bindParam(":nome", $nome);
$stmt->bindParam(":endereco", $endereco);
$stmt->bindParam(":bairro", $bairro);
$stmt->bindParam(":municipio", $municipio);
$stmt->bindParam(":fone", $fone);
$stmt->bindParam(":cpf", $cpf);
$stmt->bindParam(":pagamento", $pagamento);
$stmt->bindParam(":quantidade1", $quantidade1);
$stmt->bindParam(":descricao1", $descricao1);
$stmt->bindParam(":valor1", $valor1);
$stmt->bindParam(":quantidade2", $quantidade2);
$stmt->bindParam(":descricao2", $descricao2);
$stmt->bindParam(":valor2", $valor2);
$stmt->bindParam(":quantidade3", $quantidade3);
$stmt->bindParam(":descricao3", $descricao3);
$stmt->bindParam(":valor3", $valor3);
$stmt->bindParam(":quantidade4", $quantidade4);
$stmt->bindParam(":descricao4", $descricao4);
$stmt->bindParam(":valor4", $valor4);
$stmt->bindParam(":quantidade5", $quantidade5);
$stmt->bindParam(":descricao5", $descricao5);
$stmt->bindParam(":valor5", $valor5);
$stmt->bindParam(":id", $id);

if($stmt->execute()) {
    header("Location: consultaPedido.php");
} else {
    echo "Ocorreu um erro na alteração do pedido";
    print_r($stmt->errorInfo());
}