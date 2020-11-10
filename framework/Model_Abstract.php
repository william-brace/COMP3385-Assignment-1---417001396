<?php

namespace Framework;

abstract class Model_Abstract{

    protected $cached_json = [];
    //Retrieves all the records from the JSON file and returns them in a multi-dimensional associative array.
    abstract public function findAll() : array ;

    //array.Retrieves a database record using the id stored in the Model data structure.
    //Returns the data in an associative array.
    abstract public function findRecord(string $id) : array ;

    public function loadData(string $fromFile) : array
    {
        $filename = basename($fromFile, '.json');
        if (!isset($this->cached_json[$filename]) || empty($this->cached_json[$filename]))
        {
            $json_file=file_get_contents($fromFile);
            $this->cached_json[$filename] = json_decode($json_file, true);
        }
        return $this->cached_json[$filename];

    }

    public function makeConnection() {
        //make database connection
        $connect = mysqli_connect('localhost', 'root', 'root', 'mooc');

        if (!$connect)
        {
            die('Database connection failed!');
        }

        return $connect;

    }
}