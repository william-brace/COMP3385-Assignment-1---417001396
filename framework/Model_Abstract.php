<?php

abstract class Model_Abstract{

    
    //Retrieves all the records from the JSON file and returns them in a multi-dimensional associative array.
    abstract public function getAll() : array ;

    //array.Retrieves a database record using the id stored in the Model data structure.
    //Returns the data in an associative array.
    abstract public function getRecord(tring $id) : array ;

    public function loadData(array $data)
    {

    }
}