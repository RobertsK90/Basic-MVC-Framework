<?php

class App {
    private $router;

    public function __construct(Router $router) {
        $this->router = $router;
        $router->route($this->parseUrl());

    }

    protected function parseUrl() {
        if (isset($_GET['url'])) {
            return explode('/',filter_var(rtrim($_GET['url'],'/'), FILTER_SANITIZE_URL));
        }
    }
}