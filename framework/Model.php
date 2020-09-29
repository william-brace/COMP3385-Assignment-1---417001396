<?php


require './framework/ObservableInterface.php';

abstract class Model implements Observable {

    public function attach(Observer $observer) {

    }
    
    public function detach(Observer $observer) {

    }
    
    public function notify() {

    }

    public function getAll() {

    }

    public function getRecord(tring $id) {

    }
}