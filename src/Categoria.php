<?php


class Categoria
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = new PDO("mysql: host=localhost; dbname=sistema_cadastro", "root", "");
    }

    public function cadastrarCategoria()
    {
        if (empty($_POST['novaCategoria'])) {
            echo json_encode([
                'tipo' => 'erro',
                'message' => 'Nome vazio!'
            ]);
            exit;
        }
        $nomeCategoria = $_POST['novaCategoria'];

        $sql = "
        INSERT INTO 
            categoria (
            descricao
            ) 
        VALUE 
            ('$nomeCategoria')
        ";
        $comando = $this->conexao->prepare($sql);

        if ($comando->execute()) {
            echo json_encode([
                'tipo' => 'sucesso',
                'message' => 'Cadastrado com sucesso!'
            ]);
            exit;
        }

        echo json_encode([
            'tipo' => 'erro',
            'message' => 'Não foi possivel realizar o cadastro.'
        ]);
    }

    public function atualizarCategoria($categoria)
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $sql = "
        UPDATE
            categoria
        SET 
            descricao = :descricao
        WHERE
            id= :id
            ";
        $comando = $this->conexao->prepare($sql);
        $comando->bindParam(":descricao", $categoria);
        $comando->bindParam(":id", $id);
        $comando->execute();

    }

    public function excluir()
    {
        $id = $_POST['id'];
        $sql = "
            DELETE FROM 
                categoria 
            WHERE  
                id = $id
             ";
        $comando = $this->conexao->prepare($sql);
        $comando->execute();

    }

    public function idCategoria()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $sql = "
        SELECT 
            id,
            descricao
        FROM
            categoria
        WHERE id = $id
        ";
        $comando = $this->conexao->prepare($sql);
        $comando->execute();
        return $comando->fetchAll(PDO::FETCH_ASSOC);
    }

    public function receberCategoria(): array
    {
        $sql = "
        SELECT 
            id,
            descricao 
        FROM 
            categoria
        ORDER BY
            descricao ASC
        ";
        $comando = $this->conexao->prepare($sql);
        $comando->execute();

        return $comando->fetchAll(PDO::FETCH_ASSOC);
    }
}