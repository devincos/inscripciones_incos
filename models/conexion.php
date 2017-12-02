<?php
class Conexion
{
    private static $instancia;
    private $dbh;
    private $host = 'localhost';
    private $db = 'incos_db';
    private $username = 'incos_user';
    private $password = 'incos_pass';

    private function __construct()
    {
        $dsn = "pgsql:host=".$this->host.";port=5432;dbname=".$this->db.";user=".$this->username.";password=".$this->password;

        try {
            $this->dbh = new PDO($dsn);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
            die();
        }
    }
}
?>