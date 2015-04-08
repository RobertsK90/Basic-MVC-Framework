<?php


class homeController extends Controller {
    public function index($user = null) {
        $model = $this->model('User');

        if ($user) {
            $user = $model->get($user);
        }



        $this->view('home/index', ['user' => $user]);
    }
} 