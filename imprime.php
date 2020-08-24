<?php
require_once "inicia.php";

$PDO = conecta_bd();

$id = isset($_GET['id']) ? $_GET['id'] : null;
if (empty($id)) {
    echo "O ID do pedido não foi informado!";
    exit;
}

$sql = "SELECT id, nome, endereco, bairro, municipio, fone, cpf, 
pagamento, quantidade1, descricao1, valor1, quantidade2, descricao2, valor2, 
quantidade3, descricao3, valor3, quantidade4, descricao4, valor4, quantidade5, 
descricao5, valor5, frete, montagem, prazo, vendedor from pedidos where id = :id
order by id";

$stmt = $PDO->prepare($sql);
$stmt->bindParam(":id", $id);
$stmt->execute();
$resultado = $stmt->fetch();

if (!is_array($resultado)) {
    echo "Nenhum pedido encontrado com esse ID!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido</title>
    <link rel="stylesheet" href="style_imprime.css">
</head>

<body>
    <div class="container">
        <div class="header borda">
            <div class="logo borda">
                <h1>Rivito Moveis</h1>
            </div>
            <div class="infos borda">
                <h3>3493.3957 / 98459.1232</h3>
                <p>
                    <strong>Rivito Móveis e Decorações Ltda.</strong><br>
                    Av. Plácido Motim, 1640 - Cecilia - Viamão - RS
                </p>
            </div>
            <div class="num-pedido borda">
                <p>Pedido:</p>
                <p id="num-pedido"><?php echo $resultado['id'] ?></p>
            </div>
        </div>
        <div class="main-cliente borda">
            <div class="nome borda">Nome: <?php echo $resultado['nome'] ?></div>
            <div class="fone borda">Telefone: <?php echo $resultado['fone'] ?></div>
            <div class="cpf borda">CPF: <?php echo $resultado['cpf'] ?></div>
            <div class="endereco borda">Endereço: <?php echo $resultado['endereco'] ?></div>
            <div class="bairro borda">Bairro: <?php echo $resultado['bairro'] ?></div>
            <div class="municipio borda">Muncipio: <?php echo $resultado['municipio'] ?></div>
            <div class="pagamento borda">Pagamento: <?php echo $resultado['pagamento'] ?></div>
            <div class="frete borda">Frete: R$ <?php echo $resultado['frete'] ?></div>
            <div class="montagem borda">Montagem: R$ <?php echo $resultado['montagem'] ?></div>
            <div class="prazo borda">Prazo: <?php echo $resultado['prazo'] ?> dias</div>
            <div class="vendedor borda">Vendedor: <?php echo $resultado['vendedor'] ?></div>

        </div>
        <div class="main-produtos borda">
            <table>
                <thead>
                    <th>Qtd</th>
                    <th>Descrição do Produto</th>
                    <th>Valor</th>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $resultado['quantidade1'] ?> un</td>
                        <td><?php echo $resultado['descricao1'] ?></td>
                        <td>R$ <?php echo $resultado['valor1'] * $resultado['quantidade1'] ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $resultado['quantidade2'] ?> un</td>
                        <td><?php echo $resultado['descricao2'] ?></td>
                        <td>R$ <?php echo $resultado['valor2'] * $resultado['quantidade2'] ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $resultado['quantidade3'] ?> un</td>
                        <td><?php echo $resultado['descricao3'] ?></td>
                        <td>R$ <?php echo $resultado['valor3'] * $resultado['quantidade3'] ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $resultado['quantidade4'] ?> un</td>
                        <td><?php echo $resultado['descricao4'] ?></td>
                        <td>R$ <?php echo $resultado['valor4'] * $resultado['quantidade4'] ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $resultado['quantidade5'] ?> un</td>
                        <td><?php echo $resultado['descricao5'] ?></td>
                        <td>R$ <?php echo $resultado['valor5'] * $resultado['quantidade5'] ?></td>
                    </tr>
                    
                </tbody>
            </table>
            <div class="footer produto">
                <span class="jaba borda">Aplicação desenvolvida por Lenin Quadros - 
                    51 9.9313.1014</span>
                <div class="total borda">Total: R$ <?php echo 
                    ($resultado['valor1'] * $resultado['quantidade1']) +
                    ($resultado['valor2'] * $resultado['quantidade2']) + 
                    ($resultado['valor3'] * $resultado['quantidade3']) + 
                    ($resultado['valor4'] * $resultado['quantidade4']) +
                    ($resultado['valor5'] * $resultado['quantidade5']) +
                    $resultado['frete'] + $resultado['montagem'] ?></div>
            </div>
        </div>
        
    </div>
    <hr>
    <div class="container">
        <div class="header borda">
            <div class="logo borda">
                <h1>Rivito Moveis</h1>
            </div>
            <div class="infos borda">
                <h3>3493.3957 / 98459.1232</h3>
                <p>
                    <strong>Rivito Móveis e Decorações Ltda.</strong><br>
                    Av. Plácido Motim, 1640 - Cecilia - Viamão - RS
                </p>
            </div>
            <div class="num-pedido borda">
                <p>Pedido:</p>
                <p id="num-pedido"><?php echo $resultado['id'] ?></p>
            </div>
        </div>
        <div class="main-cliente borda">
            <div class="nome borda">Nome: <?php echo $resultado['nome'] ?></div>
            <div class="fone borda">Telefone: <?php echo $resultado['fone'] ?></div>
            <div class="cpf borda">CPF: <?php echo $resultado['cpf'] ?></div>
            <div class="endereco borda">Endereço: <?php echo $resultado['endereco'] ?></div>
            <div class="bairro borda">Bairro: <?php echo $resultado['bairro'] ?></div>
            <div class="municipio borda">Muncipio: <?php echo $resultado['municipio'] ?></div>
            <div class="pagamento borda">Pagamento: <?php echo $resultado['pagamento'] ?></div>
            <div class="frete borda">Frete: R$ <?php echo $resultado['frete'] ?></div>
            <div class="montagem borda">Montagem: R$ <?php echo $resultado['montagem'] ?></div>
            <div class="prazo borda">Prazo: <?php echo $resultado['prazo'] ?> dias</div>
            <div class="vendedor borda">Vendedor: <?php echo $resultado['vendedor'] ?></div>

        </div>
        <div class="main-produtos borda">
            <table>
                <thead>
                    <th>Qtd</th>
                    <th>Descrição do Produto</th>
                    <th>Valor</th>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $resultado['quantidade1'] ?> un</td>
                        <td><?php echo $resultado['descricao1'] ?></td>
                        <td>R$ <?php echo $resultado['valor1'] * $resultado['quantidade1'] ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $resultado['quantidade2'] ?> un</td>
                        <td><?php echo $resultado['descricao2'] ?></td>
                        <td>R$ <?php echo $resultado['valor2'] * $resultado['quantidade2'] ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $resultado['quantidade3'] ?> un</td>
                        <td><?php echo $resultado['descricao3'] ?></td>
                        <td>R$ <?php echo $resultado['valor3'] * $resultado['quantidade3'] ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $resultado['quantidade4'] ?> un</td>
                        <td><?php echo $resultado['descricao4'] ?></td>
                        <td>R$ <?php echo $resultado['valor4'] * $resultado['quantidade4'] ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $resultado['quantidade5'] ?> un</td>
                        <td><?php echo $resultado['descricao5'] ?></td>
                        <td>R$ <?php echo $resultado['valor5'] * $resultado['quantidade5'] ?></td>
                    </tr>
                    
                </tbody>
            </table>
            <div class="footer produto">
                <span class="jaba borda">Aplicação desenvolvida por Lenin Quadros - 
                    51 9.9313.1014</span>
                <div class="total borda">Total: R$ <?php echo 
                    ($resultado['valor1'] * $resultado['quantidade1']) +
                    ($resultado['valor2'] * $resultado['quantidade2']) + 
                    ($resultado['valor3'] * $resultado['quantidade3']) + 
                    ($resultado['valor4'] * $resultado['quantidade4']) +
                    ($resultado['valor5'] * $resultado['quantidade5']) +
                    $resultado['frete'] + $resultado['montagem'] ?></div>
            </div>
        </div>
        
    </div>
    <hr>
    <div class="container">
        <div class="header borda">
            <div class="logo borda">
                <h1>Rivito Moveis</h1>
            </div>
            <div class="infos borda">
                <h3>3493.3957 / 98459.1232</h3>
                <p>
                    <strong>Rivito Móveis e Decorações Ltda.</strong><br>
                    Av. Plácido Motim, 1640 - Cecilia - Viamão - RS
                </p>
            </div>
            <div class="num-pedido borda">
                <p>Pedido:</p>
                <p id="num-pedido"><?php echo $resultado['id'] ?></p>
            </div>
        </div>
        <div class="main-cliente borda">
            <div class="nome borda">Nome: <?php echo $resultado['nome'] ?></div>
            <div class="fone borda">Telefone: <?php echo $resultado['fone'] ?></div>
            <div class="cpf borda">CPF: <?php echo $resultado['cpf'] ?></div>
            <div class="endereco borda">Endereço: <?php echo $resultado['endereco'] ?></div>
            <div class="bairro borda">Bairro: <?php echo $resultado['bairro'] ?></div>
            <div class="municipio borda">Muncipio: <?php echo $resultado['municipio'] ?></div>
            <div class="pagamento borda">Pagamento: <?php echo $resultado['pagamento'] ?></div>
            <div class="frete borda">Frete: R$ <?php echo $resultado['frete'] ?></div>
            <div class="montagem borda">Montagem: R$ <?php echo $resultado['montagem'] ?></div>
            <div class="prazo borda">Prazo: <?php echo $resultado['prazo'] ?> dias</div>
            <div class="vendedor borda">Vendedor: <?php echo $resultado['vendedor'] ?></div>

        </div>
        <div class="main-produtos borda">
            <table>
                <thead>
                    <th>Qtd</th>
                    <th>Descrição do Produto</th>
                    <th>Valor</th>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $resultado['quantidade1'] ?> un</td>
                        <td><?php echo $resultado['descricao1'] ?></td>
                        <td>R$ <?php echo $resultado['valor1'] * $resultado['quantidade1'] ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $resultado['quantidade2'] ?> un</td>
                        <td><?php echo $resultado['descricao2'] ?></td>
                        <td>R$ <?php echo $resultado['valor2'] * $resultado['quantidade2'] ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $resultado['quantidade3'] ?> un</td>
                        <td><?php echo $resultado['descricao3'] ?></td>
                        <td>R$ <?php echo $resultado['valor3'] * $resultado['quantidade3'] ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $resultado['quantidade4'] ?> un</td>
                        <td><?php echo $resultado['descricao4'] ?></td>
                        <td>R$ <?php echo $resultado['valor4'] * $resultado['quantidade4'] ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $resultado['quantidade5'] ?> un</td>
                        <td><?php echo $resultado['descricao5'] ?></td>
                        <td>R$ <?php echo $resultado['valor5'] * $resultado['quantidade5'] ?></td>
                    </tr>
                    
                </tbody>
            </table>
            <div class="footer produto">
                <span class="jaba borda">Aplicação desenvolvida por Lenin Quadros - 
                    51 9.9313.1014</span>
                <div class="total borda">Total: R$ <?php echo 
                    ($resultado['valor1'] * $resultado['quantidade1']) +
                    ($resultado['valor2'] * $resultado['quantidade2']) + 
                    ($resultado['valor3'] * $resultado['quantidade3']) + 
                    ($resultado['valor4'] * $resultado['quantidade4']) +
                    ($resultado['valor5'] * $resultado['quantidade5']) +
                    $resultado['frete'] + $resultado['montagem'] ?></div>
            </div>
        </div>
        
    </div>
</body>

</html>