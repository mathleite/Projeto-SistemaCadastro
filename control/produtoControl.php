<?php
require '../vendor/autoload.php';
$produto = new Produto();
if (empty($_POST['metodo'])) {
    echo 'error: metodo não existe';
    exit;
}
switch ($_POST['metodo']) {
    case 'excluir':
        $id = (int)$_POST['id'];
        $produto->excluir($id);
        break;

    case 'atualizar':
        $id = (int)$_POST['id'];
        $nome = $_POST['nome'];
        $categoria = $_POST['categoria'];
        $fornecedor = $_POST['fornecedor'];
        $diaLancamento = $_POST['diaLancamento'];
        $precoVenda = $_POST['precoVenda'];
        $precoUnitario = $_POST['precoUnitario'];
        $produto->atualizar($id, $nome, $categoria, $fornecedor, $diaLancamento, $precoVenda, $precoUnitario);
        break;

    case 'cadastrar':
        $nomeProduto = $_POST['nomeProduto'];
        $categoria = $_POST['categoria'];
        $fornecedor = $_POST['fornecedor'];
        $diaLancamento = $_POST['diaLancamento'];
        $precoVenda = $_POST['precoVenda'];
        $precoUnitario = $_POST['precoUnitario'];
        $produto->cadastar($nomeProduto, $categoria, $fornecedor, $diaLancamento, $precoVenda, $precoUnitario);
        break;
}