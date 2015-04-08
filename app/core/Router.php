<?php

class Router {
    protected $controller = 'homeController';
    protected $method = 'index';
    protected $url = [];
    protected $params = [];

    public function route($url) {
        $this->url = $url;
        $this->loadController();
        $this->loadMethod();
        $this->loadParams();

        call_user_func_array([$this->controller, $this->method], $this->params);

    }

    protected function loadController() {
        if (file_exists('../app/controllers/'.$this->url[0].'Controller.php')) {
            $this->controller = $this->url[0].'Controller';
            array_splice($this->url, 0,1);

        }
        $this->controller = new $this->controller(new Database);

    }

    protected function loadMethod() {
        if (isset($this->url[0])) {
            if (method_exists($this->controller, $this->url[0])) {
                $this->method = $this->url[0];
                array_splice($this->url,0,1);

            }
        }
    }

    protected function loadParams() {
        $this->params = $this->url ? $this->url : [];
    }

}