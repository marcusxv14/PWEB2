<?php

include_once __DIR__ . '/../Produto.php';
include_once __DIR__ . '/../../core/Database.php';

class ProdutoDAO {

    private $pdo;

    public function __construct() {
        $this->pdo = Database::conexao();
    }

    public function listarTudo(): array {
        $sql = 'SELECT * FROM produtos';

        $stmt = $this->pdo->query($sql);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $produtos = [];
        foreach ($result as $produto) {
            $produtos[] = new Produto(
                $produto['nome'],
                $produto['valor'],
                $produto['marca'],
                $produto['categoria']
            );
            $produtos[count($produtos) - 1]->setId($produto['id']);
        }
        return $produtos;
    }

    public function inserir(Produto $produto): bool {
        $nome = $produto->getNome();
        $valor = $produto->getValor();
        $marca = $produto->getMarca();
        $categoria = $produto->getCategoria();

        $sql = 'INSERT INTO produtos (nome, valor, marca, categoria) VALUES (:nome, :valor, :marca, :categoria)';

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':marca', $marca);
        $stmt->bindParam(':categoria', $categoria);

        return $stmt->execute();
    }

    public function bucar($id): Produto {
        $sql = 'SELECT * FROM produtos WHERE id = :id';

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':id', $id);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $produto = new Produto(
            $result['nome'],
            $result['valor'],
            $result['marca'],
            $result['categoria']
        );
        $produto->setId($result['id']);

        return $produto;
    }

    public function alterar(Produto $produto): bool {
        $id = $produto->getId();
        $nome = $produto->getNome();
        $valor = $produto->getValor();
        $marca = $produto->getMarca();
        $categoria = $produto->getCategoria();

        $sql = 'UPDATE produtos SET nome = :nome, valor = :valor, marca = :marca, categoria = :categoria WHERE id = :id';

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':marca', $marca);
        $stmt->bindParam(':categoria', $categoria);

        return $stmt->execute();
    }

    public function excluir(Produto $produto): bool {
        $id = $produto->getId();

        $sql = 'SELECT * FROM compras WHERE produto_id = :id';

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':id', $id);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $compra) {
            $sql = 'DELETE FROM compras WHERE id = :id';

            $stmt = $this->pdo->prepare($sql);

            $stmt->bindParam(':id', $compra['id']);

            $stmt->execute();
        }

        $sql = 'DELETE FROM produtos WHERE id = :id';

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

}
