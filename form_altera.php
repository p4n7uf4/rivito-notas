<?php
require_once "inicia.php";

$id = isset($_GET['id']) ? (int)$_GET['id'] : null;
if (empty($id)) {
    echo "O codigo do pedido para alteração não foi definido";
    exit;
}

$PDO = conecta_bd();
$stmt = $PDO->prepare("SELECT nome, endereco, bairro, municipio, fone, cpf, pagamento, quantidade1, descricao1, valor1, quantidade2, descricao2, valor2, quantidade3, descricao3, valor3, quantidade4, descricao4, valor4, quantidade5, descricao5, valor5 FROM pedidos WHERE id = :id");
$stmt->bindParam(":id", $id, PDO::FETCH_ASSOC);
$stmt->execute();
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

if (!is_array($resultado)) {
    echo "Nenhum pedido encontrado com o id informado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rivito Moveis</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
    <header class="header">
        <div class="logo">
            <h2>Rivito Móveis </h2>
        </div>
    </header>
    <div class="container">
        <form action="altera.php" method="post">
            <h3>Cliente: </h3>
            <hr>
            <label for="nome">Nome: </label>
            <input type="text" name="nome" id="nome" value="<?= $resultado['nome'] ?>">

            <label for="nome">Endereço: </label>
            <input type="text" name="endereco" id="endereco" value="<?= $resultado['endereco'] ?>">

            <label for="nome">Bairro: </label>
            <input type="text" name="bairro" id="bairro" value="<?= $resultado['bairro'] ?>">

            <label for="nome">Municipio: </label>
            <input type="text" name="municipio" id="municipio" value="<?= $resultado['municipio'] ?>">

            <label for="nome">Fone: </label>
            <input type="text" name="fone" id="fone" value="<?= $resultado['fone'] ?>">

            <label for="nome">CPF: </label>
            <input type="text" name="cpf" id="cpf" value="<?= $resultado['cpf'] ?>">

            <label for="pagamento">Forma de pagamento:</label>
            <select name="pagamento" id="pagamento">
                <option value="A vista">À vista</option>
                <option value="A prazo">À prazo</option>
                <option value="Cartão de Crédito">Cartão de credito</option>
                <option value="Cartão de Débito">Cartão de débito</option>
            </select>
            <hr>

            <h3>Descrição das mercadorias</h3>
            <hr>
            <p>1° item:</p>
            <label for="quantidade1">Quantidade: </label>
            <input type="text" name="quantidade1" id="quantidade1" value="<?= $resultado['quantidade1'] ?>">
            <label for="descricao1">Descrição: </label>
            <input type="text" name="descricao1" id="descricao1" value="<?= $resultado['descricao1'] ?>">
            <label for="valor1">Valor: </label>
            <input type="text" name="valor1" id="valor1" value="<?= $resultado['valor1'] ?>">
            <hr>

            <p>2° item:</p>
            <label for="quantidade2">Quantidade: </label>
            <input type="text" name="quantidade2" id="quantidade2" value="<?= $resultado['quantidade2'] ?>">
            <label for="descricao2">Descrição: </label>
            <input type="text" name="descricao2" id="descricao2" value="<?= $resultado['descricao2'] ?>">
            <label for="valor2">Valor: </label>
            <input type="text" name="valor2" id="valor2" value="<?= $resultado['valor2'] ?>">
            <hr>

            <p>3° item:</p>
            <label for="quantidade3">Quantidade: </label>
            <input type="text" name="quantidade3" id="quantidade3" value="<?= $resultado['quantidade3'] ?>">
            <label for="descricao3">Descrição: </label>
            <input type="text" name="descricao3" id="descricao3" value="<?= $resultado['descricao3'] ?>">
            <label for="valor3">Valor: </label>
            <input type="text" name="valor3" id="valor3" value="<?= $resultado['valor3'] ?>">
            <hr>

            <p>4° item:</p>
            <label for="quantidade4">Quantidade: </label>
            <input type="text" name="quantidade4" id="quantidade4" value="<?= $resultado['quantidade4'] ?>">
            <label for="descricao4">Descrição: </label>
            <input type="text" name="descricao4" id="descricao4" value="<?= $resultado['descricao4'] ?>">
            <label for="valor4">Valor: </label>
            <input type="text" name="valor4" id="valor4" value="<?= $resultado['valor4'] ?>">
            <hr>

            <p>5° item:</p>
            <label for="quantidade5">Quantidade: </label>
            <input type="text" name="quantidade5" id="quantidade5" value="<?= $resultado['quantidade5'] ?>">
            <label for="descricao5">Descrição: </label>
            <input type="text" name="descricao5" id="descricao5" value="<?= $resultado['descricao5'] ?>">
            <label for="valor5">Valor: </label>
            <input type="text" name="valor5" id="valor5" value="<?= $resultado['valor5'] ?>">
            <hr>
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="submit" value="Salvar">
            <input type="reset" value="Limpar">
        </form>
    </div>
</body>

</html>