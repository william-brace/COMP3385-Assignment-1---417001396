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

        

        $name = $signup_data['name'];
        $email = $signup_data['email'];
        $password1 = $signup_data['password'];
        $password2 = $signup_data['password2'];

        $password_errors = $this->model->validatePassword($password1, $password2);
        

        if (!empty($password_errors)) {
            $v->addVar('password_errors', $password_errors);
            $v->setTemplate(TPL_DIR . '/signup.tpl.php');
            $v->display();        
        }
        else {
            //hash first password
            $signup_data['password'] = password_hash($signup_data['password'], PASSWORD_DEFAULT);

            //remove retyped password from data
            array_pop($signup_data);

            //open file
            if (file_exists(DATA_DIR . "/users.json")) {
                //get data from file and store it in users_data
                $users_data = file_get_contents(DATA_DIR . "/users.json");

                //put new user in users array
                $users_data = json_decode($users_data);
                $users_data[] = $signup_data;
                $users_data = json_encode($users_data);

                //send new array contents back to json file to update it
                if (file_put_contents(DATA_DIR . "/users.json", $users_data)) {
                    echo "User added!";
                }
                else {
                    echo "User failed to be added";
                }
            }
            else {
                echo "File could not be found";
            }

            $v->setTemplate(TPL_DIR . '/login.tpl.php');
            $v->display();
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