<?php

include __DIR__. '/../database/DatabaseInfo.php';

class Database {
    protected static $db;
    private function __construct() {
        $db_host = DatabaseInfo::DB_HOST;
        $db_port = DatabaseInfo::DB_PORT; // Adicionando a porta do MySQL
        $db_nome = DatabaseInfo::DB_NOME;
        $db_usuario = DatabaseInfo::DB_USUARIO;
        $db_senha = DatabaseInfo::DB_SENHA;
        $db_driver = DatabaseInfo::DB_DRIVER;
        $sistema_titulo = DatabaseInfo::SISTEMA_TITULO;
        try {
            self::$db = new PDO("$db_driver:host=$db_host;port=$db_port;dbname=$db_nome", $db_usuario, $db_senha);
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$db->exec('SET NAMES utf8');
        }
        catch (PDOException $e) {
            echo "PDOException em $sistema_titulo: ", $e->getMessage();
            die("Connection Error: " . $e->getMessage());
        }
    }   
    public static function conexao() {
        if (!self::$db) {
            new Database();
        }
        return self::$db;
    }
}