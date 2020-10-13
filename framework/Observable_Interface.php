<?php 

interface Observable_Interface
{
    public function attach(Observer $observer);
    public function detach(Observer $observer);
    public function notify();
}