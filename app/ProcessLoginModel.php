<?php

namespace Apps\handlers;

use Framework\Observable_Model;

class ProcessLoginModel extends Observable_Model {

    public function findAll(): array {
       return $_POST;
    }

    public function findRecord(string $id): array {
        return [];
    }

    public function checkUser(string $email, string $password) {
        $connection = $this->makeConnection();


        
       

            // $db_username = $row['username'];
            // $db_password = $row['password'];

            //         echo "db username is " . $db_username . " and db password is " . $db_password;


            //         if (password_verify($password, $db_password))
            //         {
            //             $_SESSION['username'] = $username;
                        


            //             header("Location: ../profile.html.php");
            //         }
            //         else
            //         {
            //             $signinUsernameErrors = "Invalid Username";
            //             $signinPasswordErrors = "Invalid Password";
            //             include("../index.html.php");
                        
            //         }
            //     }
            // }  

        
    }

    
}