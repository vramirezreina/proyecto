<?php

class Database {
    private $hostname = "localhost";
    private $database = "soluciones_electricas";
    private $username = "root";
    private $password = "";
    private $charset = "utf8";
    private $pdo;

    public function conectar() {
        
        try{
        $conexion = "mysql:host={$this->hostname};dbname={$this->database};charset={$this->charset}";

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

            $this->pdo = new PDO($conexion, $this->username, $this->password, $options);
            return $this->pdo;
        
    }catch(PDOException $e){
        echo 'Error conexion:'. $e->getMessage();
        exit;
    }

    }
}
