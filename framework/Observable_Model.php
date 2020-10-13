<?php

require './framework/Model_Abstract.php';
require './framework/Observable_Interface.php';

abstract class ObservableModel extends Model_Abstract implements Observable_Interface  {

    protected $observers = [];

    protected $updatedData = [];

    public function attach(Observer_Interface $observer) {
        $this->$observers = $observer;
    }
    
    public function detach(Observer $observer) {
        $this->observers = array_filter($this->observers, function ($a) use ($observer) {
            return (! ($a == $observer));
        });
    }
    
    public function notify() {
        foreach($this->observers as $ob) {
            $ob->update($this);
        }
    }

    public function updatedData() {
        return $this->updatedData;
    }

    abstract public function getAll() : array ;

    abstract public function getRecord(tring $id) : array ;

}