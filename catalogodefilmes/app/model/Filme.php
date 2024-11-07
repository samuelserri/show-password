<?php

// classe Model que representa a tabela filme no db
class Filme {
    private $table = "filme";

    private $conn;

    // colunas da tabela
    public $id;
    public $titulo;
    public $ano;
    public $descricao;

    // parâmetro de connexão opcional
    public function __construct($conn = null) {
        $this->conn = $conn;
    }

    // método responsável por buscar todos os filmes
    public function findAll() {
        $query = "SELECT * FROM $this->table";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);

        return $stmt->fetchAll();
    }

    // método responsável por buscar 1 o filme
    public function findById($id) {
        $query = "SELECT * FROM $this->table
            WHERE id = :id";
        
        $stmt = $this->conn->prepare($query);
        // Configurando o PDO para comparar inteiros
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        // configura o PDO para retornar uma instância da classe
        // como resultado da consulta.
        $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);

        return $stmt->fetch();
    }
}