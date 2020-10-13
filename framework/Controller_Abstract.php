<?php

abstract class Controller_Abstract {

    protected $model = null;
    protected $view = null;

    //assigns the Model object to the protected attribute $model in the Controller class, which is initialized as null. [2 marks]
     public function setModel(Observable_Model $model) {
        $this->model = $model;
     } 

    //assigns the View object to the protected attribute $view in theController class, which is initialized as null.
     public function  setView(View $view) {
        $this->view = $view;
     }  

    //an abstarct method that performs the page’s business logic.
     abstract public function run(); 
}