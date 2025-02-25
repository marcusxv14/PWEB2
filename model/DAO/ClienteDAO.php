<?php

include_once __DIR__ . '/../Cliente.php';
include_once __DIR__ . '/../../core/Database.php';

class ClienteDAO {

    private $pdo;

    public function __construct() {
        $this->pdo = Database::conexao();
    }

    public function listarTudo(): array {
        $sql = 'SELECT * FROM clientes';

        $stmt = $this->pdo->query($sql);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $clientes = [];
        foreach ($result as $cliente) {
            $clientes[] = new Cliente(
                $cliente['nome'],
                $cliente['cpf'],
                $cliente['dt_nasc'],
                $cliente['whatsapp'],
                $cliente['logradouro'],
                $cliente['num'],
                $cliente['bairro']
            );
            $clientes[count($clientes) - 1]->setId($cliente['id']);
        }
        return $clientes;
    }

    public function inserir(Cliente $cliente): bool {
        $nome = $cliente->getNome();
        $cpf = $cliente->getCpf();
        $dt_nasc = $cliente->getDt_nasc();
        $whatsapp = $cliente->getWhatsapp();
        $logradouro = $cliente->getLogradouro();
        $num = $cliente->getNum();
        $bairro = $cliente->getBairro();

        $sql = 'INSERT INTO clientes (nome, cpf, dt_nasc, whatsapp, logradouro, num, bairro)
        VALUES (:nome, :cpf, :dt_nasc, :whatsapp, :logradouro, :num, :bairro)';

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':dt_nasc', $dt_nasc);
        $stmt->bindParam(':whatsapp', $whatsapp);
        $stmt->bindParam(':logradouro', $logradouro);
        $stmt->bindParam(':num', $num);
        $stmt->bindParam(':bairro', $bairro);


        return $stmt->execute();
    }

    public function bucar($id): Cliente {

        $sql = 'SELECT * FROM clientes WHERE id = :id';

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':id', $id);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        
        $cliente = new Cliente(
            $result['nome'],
            $result['cpf'],
            $result['dt_nasc'],
            $result['whatsapp'],
            $result['logradouro'],
            $result['num'],
            $result['bairro']
        );
        $cliente->setId($result['id']);
        
        return $cliente;
    }

    public function alterar(Cliente $cliente): bool {
        $id = $cliente->getId();
        $nome = $cliente->getNome();
        $cpf = $cliente->getCpf();
        $dt_nasc = $cliente->getDt_nasc();
        $whatsapp = $cliente->getWhatsapp();
        $logradouro = $cliente->getLogradouro();
        $num = $cliente->getNum();
        $bairro = $cliente->getBairro();

        $sql = 'UPDATE clientes
        SET nome = :nome, cpf = :cpf, dt_nasc = :dt_nasc, whatsapp = :whatsapp, logradouro = :logradouro, num = :num, bairro = :bairro
        WHERE id = :id';
        
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':dt_nasc', $dt_nasc);
        $stmt->bindParam(':whatsapp', $whatsapp);
        $stmt->bindParam(':logradouro', $logradouro);
        $stmt->bindParam(':num', $num);
        $stmt->bindParam(':bairro', $bairro);

        return $stmt->execute();
    }

    public function excluir(Cliente $cliente): bool {
        $id = $cliente->getId();

        // Excluir primeiro todos os agendamentos associados ao cliente
        $sql = 'SELECT * FROM agendamentos WHERE cliente_id = :id';

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':id', $id);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $agendamento) {
            $sql = 'DELETE FROM agendamentos WHERE id = :id';

            $stmt = $this->pdo->prepare($sql);

            $stmt->bindParam(':id', $agendamento['id']);

            $stmt->execute();
        }

        // Depois exclui todas as compras associadas ao cliente
        $sql = 'SELECT * FROM compras WHERE cliente_id = :id';

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
        
        // Depois exclui o cliente
        $sql = 'DELETE FROM clientes WHERE id = :id';

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }
}
