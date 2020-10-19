<?php
class ProcessRegistrationModel extends Observable_Model {

    public function getAll(): array {

       return $_POST;
    }

    public function getRecord(string $id): array {
        return [];
    }

    public function validatePassword($password) {
        $passwordErrors[] = null;

        if (strlen($password) < 10) {
            $passwordErrors[] = "Password must be at least 10 characters long";
        }
        if (preg_match("/[0-9]/",$password) == 0) {
            $passwordErrors[] = "Password must contain at least one digit";
        }
        if (preg_match("/^[a-zA-Z]*[A-Z]+[a-zA-Z]*$/",$password) == 0) {
            $passwordErrors[] = " Password must contain at least one uppercase character";
        }

        return $passwordErrors;



        // if (preg_match("/[a-z]/i",$password) == 0) {
        //     $passwordErrors = "Password must contain at least one letter";
        // }

        // if (preg_match("/[0-9]/",$password) == 0) {
        //     $passwordErrors = "Password must contain at least one digit";
        // }

    }

}