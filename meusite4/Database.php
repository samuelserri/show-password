<?php


class Database {
    private $host;
    private $port;
    private $username;
    private $password;
    private $db;

    public function __construct($host, $port, $username, $password, $db) {

        $this->host = $host;
        $this->port = $port;
        $this->username = $username;
        $this->password = $password;
        $this->db = $db;

        

    }

    // responsavel por criar a conexao com banco de dados
    public function __createConnection() {

        $connUrl = "mysql:host=$this->host;port=$this->port;dbname=$this->db";

        $this->conn = new PDO($connUrl, $this->username, $this->password);

        return $this->conn;



    }




}






?>