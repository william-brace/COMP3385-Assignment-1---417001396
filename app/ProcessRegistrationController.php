<?php 
class ProcessRegistrationController extends Controller_Abstract {
    public function run() {

        
        $sess = new SessionManager();
        $sess->create();
        $this->setModel(new ProcessRegistrationModel());
        $v = new View();

        //$this->model->attach($this->view);

        
        //Get data from post
        $signup_data = $this->model->getAll();

        var_dump($signup_data);

        $name = $signup_data['name'];
        $email = $signup_data['email'];
        $password1 = $signup_data['password'];
        $password2 = $signup_data['password2'];

        $password_errors = $this->model->validatePassword($password1);
        var_dump($password_errors);

        if ($password_errors) {
            $v->addVar('password_errors', $password_errors);
            $v->setTemplate(TPL_DIR . '/signup.tpl.php');
            $v->display();  

            
            // $data = $password_errors;

            // $this->model->updateTheChangedData($data);

            // $this->model->notify();

            // $v->setTemplate(TPL_DIR . '/signup.tpl.php');
            // $v->display();        
        }






        //Validate data form post

        //if no errors, hash password and add it to users.json file and redirect to login.php

        //if errors send back to signup.php with error messages so they can be displayed. 


        

        // $sess = new SessionManager();
        // $sess->create();
        // $v = new View();
        // $v->setTemplate(TPL_DIR . '/login.tpl.php');
        // $v->display();


        // $this->setModel(new IndexModel());
        // $this->setView($v);
        

        // $this->model->attach($this->view);

        // $data = $this->model->getAll();

        // $this->model->updateTheChangedData($data);

        // $this->model->notify();

    }
}