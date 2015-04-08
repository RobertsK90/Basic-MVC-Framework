<?php



class Controller {

    protected $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    protected function model($model){
        return new $model($this->db);
    }

    protected function view($view, $data = []) {
        extract($data);
        require_once('../app/views/'. $view. '.php');
    }

}