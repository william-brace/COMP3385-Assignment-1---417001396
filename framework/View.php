<?php 

require './framework/ObserverInterface.php';

class View implements Observer {
    
    private $tpl;

    // Sets the name of the template to be used by 
    //storing this value as a private member variable called $tpl. [2 marks]
    public function setTemplate($filename) {
        $this->tpl = $filename;
    }

    //gets template from $tpl and returns it
    public function getTemplate() {
        return $this->tpl;
    }
    

    //Processes the template file (.tpl.php) specified in the $tpl variable and 
    //outputs the page as a string that is displayed in the browser. [2 marks]
    public function display() {

        return "string";
        
    }

    //Adds a variable’s value to the template for processing [2 marks]
    public function addVar($name, $value) {

    }

    public function update(Observable $observable) {

    }

}