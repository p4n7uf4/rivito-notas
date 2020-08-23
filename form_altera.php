<?php
require_once "inicia.php";

$id = isset($_GET['id']) ? (int)$_GET['id'] : null;
if (empty($id)) {
    echo "O codigo do pedido para alteração não foi definido";
    exit;
}

$PDO = conecta_bd();
$stmt = $PDO->prepare("SELECT nome, endereco, bairro, municipio, fone, cpf, pagamento,
    quantidade1, descricao1, valor1, quantidade2, descricao2, valor2, quantidade3, descricao3,
    valor3, quantidade4, descricao4, valor4, quantidade5, descricao5, valor5, prazo, montagem, vendedor, frete
    FROM pedidos WHERE id = :id");
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
            <div class="form-row mb-2">
                <div class="col-md-6">
                    <input type="text" name="nome" id="nome" placeholder="Nome" class="form-control" value="<?= $resultado['nome'] ?>">
                </div>

                <div class="col-md">
                    <input type="text" name="cpf" id="cpf" placeholder="CPF" class="form-control" value="<?= $resultado['cpf'] ?>">
                </div>

                <div class=" col-md">
                    <input type="number" name="fone" id="fone" placeholder="Telefone" class="form-control" value="<?= $resultado['fone'] ?>">
                </div>
            </div>

            <div class=" form-row mb-2">
                <div class="col">
                    <input type="text" name="endereco" id="endereco" class="form-control" placeholder="Endereço" value="<?= $resultado['endereco'] ?>">
                </div>
            </div>

            <div class="form-row mb-2">
                <div class="col">
                    <input type="text" name="bairro" id="bairro" class="form-control" placeholder="Bairro" value="<?= $resultado['bairro'] ?>">
                </div>

                <div class="col">
                    <input type="text" name="municipio" id="municipio" class="form-control" placeholder="Municipio" value="<?= $resultado['municipio'] ?>">
                </div>
            </div>
            <div class="form-row mb-2">
                <div class="col">
                    <input type="number" name="frete" id="frete" class="form-control" placeholder="Valor do frete" value="<?= $resultado['frete'] ?>">
                </div>
                <div class="col">
                    <input type="number" name="montagem" id="montagem" class="form-control" placeholder="Valor da montagem" value="<?= $resultado['montagem'] ?>">
                </div>
                <div class="col-md-2">
                    <input type="number" name="prazo" id="prazo" class="form-control" placeholder="Prazo de entrega" value="<?= $resultado['prazo'] ?>">
                </div>
                <div class="col-md-4">
                    <input type="text" name="vendedor" id="vendedor" class="form-control" placeholder="Vendedor" value="<?= $resultado['vendedor'] ?>">
                </div>
            </div>

            <select name="pagamento" id="pagamento" class="form-control">
                <option value="A vista">À vista</option>
                <option value="A prazo">À prazo</option>
                <option value="Cartão de Crédito">Cartão de credito</option>
                <option value="Cartão de Débito">Cartão de débito</option>
            </select>
            <hr>

            <h3>Descrição das mercadorias</h3>
            <hr>
            <p>1° item:</p>
            <div class="form-row">
                <div class="col-md-1">
                    <input type="number" name="quantidade1" placeholder="Qtd" id="quantidade1" class="form-control" value="<?= $resultado['quantidade1'] ?>">
                </div>
                <div class="col-md">
                    <input type="text" name="descricao1" placeholder="Descrição do produto" id="descricao1" class="form-control" value="<?= $resultado['descricao1'] ?>">
                </div>
                <div class="col-md-3">
                    <input type="number" name="valor1" placeholder="Valor" id="valor1" class="form-control" value="<?= $resultado['valor1'] ?>">
                </div>
            </div>
            <hr>

            <p>2° item:</p>
            <div class="form-row">
                <div class="col-md-1">
                    <input type="number" name="quantidade2" placeholder="Qtd" id="quantidade2 " class="form-control" value="<?= $resultado['quantidade2'] ?>">
                </div>
                <div class="col-md">
                    <input type="text" name="descricao2" placeholder="Descrição" id="descricao2" class="form-control" value="<?= $resultado['descricao2'] ?>">
                </div>
                <div class="col-md-3">
                    <input type="number" name="valor2" placeholder="Valor" id="valor2" class="form-control" value="<?= $resultado['valor2'] ?>">
                </div>
            </div>
            <hr>

            <p>3° item:</p>
            <div class="form-row">
                <div class="col-md-1">
                    <input type="number" name="quantidade3" placeholder="Qtd" id="quantidade3" class="form-control" value="<?= $resultado['quantidade3'] ?>">
                </div>
                <div class="col-md">
                    <input type="text" name="descricao3" placeholder="Descrição" id="descricao3" class="form-control" value="<?= $resultado['descricao3'] ?>">
                </div>
                <div class="col-md-3">
                    <input type="number" name="valor3" placeholder="Valor" id="valor3" class="form-control" value="<?= $resultado['valor3'] ?>">
                </div>
            </div>
            <hr>

            <p>4° item:</p>
            <div class="form-row">
                <div class="col-md-1">
                    <input type="number" name="quantidade4" placeholder="Qtd" id="quantidade4" class="form-control" value="<?= $resultado['quantidade4'] ?>">
                </div>
                <div class="col-md">
                    <input type="text" name="descricao4" placeholder="Descrição" id="descricao4" class="form-control" value="<?= $resultado['descricao4'] ?>">
                </div>
                <div class="col-md-3">
                    <input type="number" name="valor4" placeholder="Valor" id="valor4" class="form-control" value="<?= $resultado['valor4'] ?>">
                </div>
            </div>
            <hr>

            <p>5° item:</p>
            <div class="form-row">
                <div class="col-md-1">
                    <input type="number" name="quantidade5" placeholder="Qtd" id="quantidade5" class="form-control" value="<?= $resultado['quantidade5'] ?>">
                </div>
                <div class="col-md">
                    <input type="text" name="descricao5" placeholder="Descrição" id="descricao5" class="form-control" value="<?= $resultado['descricao5'] ?>">
                </div>
                <div class="col-md-3">
                    <input type="number" name="valor5" placeholder="Valor" id="valor5" class="form-control" value="<?= $resultado['valor5'] ?>">
                </div>
            </div>
            <hr>
            <input type="hidden" name="id" id="id" value="<?=$id?>">
            <input type="submit" value="Salvar" class="btn btn-success">
            <input type="reset" value="Limpar" class="btn btn-light">
            <a href="index.html" class="btn btn-primary">Voltar</a>
        </form>
    </div>
</body>

</html>