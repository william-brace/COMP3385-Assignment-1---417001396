<?php

require './framework/View.php';

class ViewTest extends PHPUnit\Framework\TestCase {

    private $view;
    private $name;

    public function setUp() : void {
        $this->view = new View();
    }

    public function tearDown() : void {

    }

   
    
    

    // a. Ensure a valid View object is created.
    public function testValidView() {

        $this->assertInstanceOf(View::class, new View(), $message = 'Failed to create view object of type view!');
    }

    // b. Ensure that the setTemplate, display and addVar methods perform as
    // described in Question 5. The testing must check for invalid parameters for all methods
    // and that the output of the methods is as specified.

    public function testSetTemplate() {

        //test to see if it only allows tpl files.

        //testing that $tpl is set from $filename input
        $this->view->setTemplate('index.tpl.php');
        $tpl = $this->view->getTemplate();
        $this->assertEquals($tpl, 'index.tpl.php');
    }

    public function testDisplay() {
        $page = $this->view->display();
        echo $page;
        $this->assertIsString($page);
        $this->assertNotEmpty($page);

    }


    public function testValidEquals() {
        $this->name = "william";

        $this->assertEquals($this->name, "william");
    }

}