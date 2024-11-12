<?php

class Usuario {
    private $table = "usuario";
    private $conn;

    // Propriedades do usuário
    public $id;
    public $nome;
    public $email;
    public $senha;
    public $data_criacao;

    // Construtor, opcionalmente recebe a conexão com o banco de dados
    public function __construct($conn = null) {
        $this->conn = $conn;
    }

    // Método para buscar todos os usuários
    public function findAll() {
        $query = "SELECT * FROM $this->table";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);

        return $stmt->fetchAll();
    }

    // Método para buscar um usuário pelo id
    public function findById($id) {
        $query = "SELECT * FROM $this->table WHERE id = :id";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);

        return $stmt->fetch();
    }

    // Método para buscar um usuário pelo email
    public function findByEmail($email) {
        $query = "SELECT * FROM $this->table WHERE email = :email";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);

        return $stmt->fetch();
    }
}
