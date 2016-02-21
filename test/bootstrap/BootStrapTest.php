<?php

class BootStrapTest extends PHPUnit_Framework_TestCase {

    public function testIsSetUp() {
        $bs = new \BootStrap(__DIR__ . "/units/");
        $this->assertTrue(count($bs->GetUnits()) == 1);
    }

    public function testWrongPath() {
        $bs = new \BootStrap("notexisting");
        $this->assertTrue(count($bs->GetUnits()) == 0);
    }

    public function testGetUnit() {
        $bs = new \BootStrap(__DIR__ . "/units/");
        $this->assertTrue(count($bs->GetUnits()) == 1);
    }

}

?>