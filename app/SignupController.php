<?php
class SignupController extends Controller_Abstract {
    public function run() {


        

        $sess = new SessionManager();
        $sess->create();
        $v = new View();
        $v->setTemplate(TPL_DIR . '/signup.tpl.php');
        $v->display();


        // $this->setModel(new IndexModel());
        // $this->setView($v);
        

        // $this->model->attach($this->view);

        // $data = $this->model->getAll();

        // $this->model->updateTheChangedData($data);

        // $this->model->notify();

    }
}