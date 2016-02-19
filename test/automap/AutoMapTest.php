<?php

class AutoMapTest extends PHPUnit_Framework_TestCase {

    public function testIsSetUp() {
        global $php;
        \AutoMap::Query();
        $this->assertTrue(!is_null($php));
    }

    public function testFlatObject() {
        global $php;        
        $_GET["test"] = 5;
        \AutoMap::Query();
        $this->assertTrue(property_exists($php, "get"));
        $this->assertTrue($php->get->test == 5);
    }

}

;
?>