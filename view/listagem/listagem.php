<?php
require '../../vendor/autoload.php';

$comando = new Produto();
$arrayProdutos = $comando->listarTabela();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="icon" href="../../cloud.ico/favicon.ico">

    <title>Projeto - Sistema </title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="../../index.php">Projeto Cadastro</a>


</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="listagem.php">
                            <i class="material-icons">
                                monetization_on
                            </i>
                            <span>Produtos</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../espacos/espacoFornecedor.php">
                            <i class="material-icons">
                                face
                            </i>
                            Fornecedor
                        </a>
                    <li class="nav-item">
                        <a class="nav-link" href="../espacos/espacoCategoria.php">
                            <i class="material-icons">
                                shopping_cart
                            </i>
                            Categoria
                        </a>
                    </li>
                </ul>
                <hr style="background-color: #0062cc">
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            </div>
            <h4>Tabela de Produtos</h4>
            <a style=" margin-left: 945px; text-decoration: none;" href="../cadastros/cadastrar.php">
                <button style="width: 100px; " type="button" class="btn btn-info">Novo</button>
            </a>

            <br>

            <form id="form" method="post">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th  style="color: #1315dd;">#</th>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Fornecedor</th>
                        <th>Lançamento</th>
                        <th>Venda</th>
                        <th>Unidade</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($arrayProdutos as $value) { ?>
                        <tr>
                            <th scope="row"><?= $value['id']; ?></th>
                            <td><?= $value['nome']; ?></td>
                            <td><?= $value['descricao_categoria']; ?></td>
                            <td><?= $value['nome_fornecedores']; ?></td>
                            <td><?= $value['diaLancamento']; ?></td>
                            <td>R$ <?= $value['precoVenda']; ?></td>
                            <td>R$ <?= $value['precoUnitario']; ?></td>
                            <td>
                                <a href="../editar/editar.php?id=<?= $value['id'] ?>">Editar</a>
                                <a style="color: #dd0000;" href="javascript:void(0)"
                                   onclick="excluir('<?= $value['id'] ?>')">Deletar</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <br>
                </table>
            </form>
        </main>
    </div>
</div>
<script src="../../js/jquery-3.0.0.min.js"></script>
<script src="../../js/excluirProduto.js"></script>
</body>
</html>
