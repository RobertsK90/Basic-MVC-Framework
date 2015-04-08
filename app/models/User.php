<?php

class User {
    protected $db;
    protected $table;

    public function __construct(Database $db, $table = '') {
        $this->db = $db;
        $this->table = (!empty($table)) ? $table : get_class($this).'s';
        $this->db->setTable($this->table);
    }

    public function get($id) {
        $user = $this->db->where('id', '=', $id);
        return  $user->stmt->fetch(PDO::FETCH_OBJ);
    }
}