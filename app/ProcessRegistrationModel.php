<?php
namespace Apps\handlers;

use Framework\Observable_Model;

class ProcessRegistrationModel extends Observable_Model {

    public function findAll(): array {

       return $_POST;
    }

    public function findRecord(string $id): array {
        return [];
    }

    

    public function registerUser(array $userData)
    {
        //echo $userData['name'];

        $connection = $this->makeConnection();

        $insert_Result = $this->insert($userData, $connection);

        if ($insert_Result) {
            return true;
        }
    }
}