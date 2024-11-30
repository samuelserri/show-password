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

    // Função para editar um filme
    public function editar()
    {
        // Verifica se todos os campos necessários foram preenchidos
        if (empty($this->titulo) || empty($this->descricao) || empty($this->imagem) || empty($this->ano)) {
            return false; // Retorna falso se algum campo estiver vazio
        }

        // Query SQL para atualizar um filme existente
        $query = "UPDATE " . $this->table . " SET titulo = :titulo, descricao = :descricao, imagem = :imagem, ano = :ano WHERE id = :id";

        // Preparação da query
        $stmt = $this->conn->prepare($query);

        // Bind dos parâmetros
        $stmt->bindParam(':titulo', $this->titulo);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':imagem', $this->imagem);
        $stmt->bindParam(':ano', $this->ano);
        $stmt->bindParam(':id', $this->id);

        // Executa a query e verifica se foi bem-sucedida
        if ($stmt->execute()) {
            return true; // Filme atualizado com sucesso
        }

        return false; // Falha na atualização
    }
    
    
}