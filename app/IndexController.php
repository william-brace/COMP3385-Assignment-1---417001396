<?php 

require './framework/Controller_Abstract.php';

class IndexController extends Controller_Abstract {
    public function run() {

        $this->model->attach($this->view);

        $this->model->getAll();

        $this->model->notify();

    }
}