<?php

class Fornecedor
{
    private $conexao;
    private $id;

    public function __construct()
    {
        $this->conexao = new PDO("mysql: host=localhost; dbname=sistema_cadastro", "root", "");
    }


    public function cadastrarFornecedor()
    {
        $nomeFornecedor = $_GET['novoFornecedor'];
        $sql = "
        INSERT INTO 
            fornecedores (
            nome
            ) 
        VALUE 
            ('$nomeFornecedor')
        ";
        $comando = $this->conexao->prepare($sql);
        $comando->execute();
    }


    public function receberFornecedor()
    {
        $sql = " 
        SELECT 
            id,
            nome
        FROM 
            fornecedores 
        ORDER BY 
            id ASC
        ";
        $comando = $this->conexao->prepare($sql);
        $comando->execute();
        return $comando->fetchAll(PDO::FETCH_ASSOC);
    }

    public function idFornecedor()
    {
        $id = $_GET['id'];
        $sql = "
        SELECT 
            id,
            nome
        FROM
            fornecedores
        WHERE id = $id
        ";
        $comando = $this->conexao->prepare($sql);
        $comando->execute();
        return $comando->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateFornecedor($fornecedor)
    {
        $id = $_GET['id'];
        $sql = "
        UPDATE
            fornecedores
        SET 
            nome = :nome
        WHERE
            id= :id
            ";
        $comando = $this->conexao->prepare($sql);
        $comando->bindParam(":nome", $fornecedor);
        $comando->bindParam(":id", $id);
        $comando->execute();
    }

    public function excluir()
    {
        $id = $_POST['id'];
        $sql = "
            DELETE FROM 
                fornecedores 
            WHERE  
                id = $id 
             ";
        $comando = $this->conexao->prepare($sql);
        $comando->execute();
    }

}