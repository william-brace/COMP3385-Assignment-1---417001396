<?php 

namespace Framework;

// require './autoload.php';

class Validator {
    
    private static $instance;

    private function __construct()
    {

    }
    
    public static function getInstance()
    {
        if (empty(self::$instance)) 
        { 
            self::$instance = new Validator();
        }
        return self::$instance;
    }

    public function validatePassword($password, $password2) {
        $passwordErrors = [];

        if (strcmp($password,$password2) != 0) {
            $passwordErrors[] = "Passwords must be identical";
        }
        if (strlen($password) < 10) {
            $passwordErrors[] = "Password must be at least 10 characters long";
        }
        if (preg_match("/[0-9]/",$password) == 0) {
            $passwordErrors[] = "Password must contain at least one digit";
        }
        if (preg_match("/(?=.*[A-Z])/",$password) == 0) {
            $passwordErrors[] = " Password must contain at least one uppercase character";
        }

        return $passwordErrors;
    }



    public function validateUser(string $key, string $password, $connection, $model)
    {

        //$read_Result = $this->read($key);

        $read_Result = $model->read($key, $connection);

        if ($read_Result) {

            $db_password = $read_Result['password'];

            //echo $db_password;

            if (password_verify($password, $db_password))
            {
                return true;

                // $_SESSION['username'] = $username;
                
                // header("Location: ../profile.html.php");
            }
            else
            {
                return false;
            }
        }
        else {
            return false;
        }   
    }
}