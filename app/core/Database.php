<?php


class Database {
    private $host = '[host]';
    private $db = '[db]';
    private $username = '[username]';
    private $password = '[password]';

    public $table;
    public $stmt;

    public $pdo;

    public function __construct() {

        try {
            $this->pdo = new \PDO("mysql:host={$this->host};dbname={$this->db}", $this->username, $this->password);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function setTable($table) {
        $this->table = $table;
        return $this;
    }

    public function exists($data) {
        $field = array_keys($data)[0];
        return $this->where($field,'=', $data[$field])->count() ? true : false;
    }

    public function where($field, $operator, $value) {
        $sql = "SELECT * FROM {$this->table} WHERE {$field} {$operator} ?";
        $this->stmt = $this->pdo->prepare($sql);

        $this->stmt->execute([$value]);

        return $this;

    }

    public function count() {
        return $this->stmt->rowCount();
    }

} 
