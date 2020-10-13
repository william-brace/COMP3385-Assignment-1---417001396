<?php 

require './framework/Observer_Interface.php';

class View implements Observer_Interface {
    
    private $tpl;
    private $vars = [];

    // Sets the name of the template to be used by 
    //storing this value as a private member variable called $tpl. [2 marks]
    public function setTemplate($filename) {

        // //thow exception if filename is not string
        if (!is_string($filename)) {
            throw new \Exception(
                "Filename must be of type string!"
            );
        }

        // //throw exception if filename is empty
        if (empty($filename)){
            throw new \Exception (
                "setTemplate parameter {$filename} is an empty string!"
            );
        }

        $this->tpl = $filename;
    }

    //gets template from $tpl and returns it
    public function getTemplate() {
        return $this->tpl;
    }
    

    //Processes the template file (.tpl.php) specified in the $tpl variable and 
    //outputs the page as a string that is displayed in the browser. [2 marks]
    public function display() {
        extract($this->vars);
        echo $this->tpl;
        return "asfasd";
        
    }

    //Adds a variable’s value to the template for processing [2 marks]
    public function addVar(string $name, $value) {
        $this->vars[$name] = $value;
    }

    public function getVars() {
        return $this->vars;
    }

    public function update(Observable_Model $observable) {
        $record = $observable->updatedData();
        foreach($record as $rec) {
            $this->addVar($rec['name'], $rec['value']);
        }
        $this->display();
    }

}