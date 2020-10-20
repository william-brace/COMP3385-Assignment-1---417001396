<?php 
class ProcessLoginController extends Controller_Abstract {
    public function run() {

        
        $sess = new SessionManager();
        $sess->create();
        $this->setModel(new ProcessLoginModel());
        $v = new View();

        //$this->model->attach($this->view);

        
        //Get data from post
        $login_data = $this->model->getAll();

        //assign data to variables
        $email = $login_data['email'];
        $password = $login_data['password'];

        echo $email . " " . $password;

        //check if email matches a users email in database
        if (file_exists(DATA_DIR . "/users.json")) {
            //get data from file and store it in users_data
            $users_data = file_get_contents(DATA_DIR . "/users.json");

            //put new user in users array
            $users_data = json_decode($users_data);

            $found = 0;

            

            foreach($users_data as $users) {
                $users = (array)$users;
        
                if (array_search($email, $users)) {
                    $found = 1;

                    //compare password to password in file and see if same
                    echo $users['password'];

                    if (password_verify($password ,$users['password'])) {
                        echo "\n" . "password match!! \n"; 
                        $sess->add('user', $email);

                        $v->setTemplate(TPL_DIR . '/profile.tpl.php');
                        $v->display();
                        

                    }
                    else {
                        echo "\n" . "invalid sig in \n"; 
                        $v->addVar('login_error', "Invalid email/password");
                        $v->setTemplate(TPL_DIR . '/login.tpl.php');
                        $v->display();  
                        
                    }



                    
                }
                
            }

            if ($found == 0)
            {
                echo "  Email not found";
                $v->addVar('login_error', "Invalid email/password");
                $v->setTemplate(TPL_DIR . '/login.tpl.php');
                $v->display();
                     
            }
           
        }
        else {
            echo "File could not be found";
        }
    }
}