<?php

class AutoMapTest extends PHPUnit_Framework_TestCase {

    public function testIsSetUp() {
        global $php;
        \BTRAutoMap::Query();
        $this->assertTrue(!is_null($php));
    }

    public function testFlatObject() {
        //Arrange
        $_GET["test"] = 5;
        //Act
        $php = \BTRAutoMap::Query();
        //Assert
        $this->assertTrue(property_exists($php, "get"));
        $this->assertTrue($php->get->test == 5);
    }

    public function testDeepObject() {
        //Arrange
        $_GET["foo"] = new \stdClass();
        $_GET["foo"]->bar = "42";
        $_GET["foo"]->sub = new \stdClass();
        $_GET["foo"]->sub->subsub = 5;
        //Act
        $php = \BTRAutoMap::Query();
        //Assert
        $this->assertTrue(property_exists($php, "get"));
        $this->assertTrue($php->get->foo->bar == "42");
        $this->assertTrue($php->get->foo->sub->subsub == 5);
    }

    public function testNull() {
        //Arrange
        $_GET["foo"] = null;
        //Act
        $php = \BTRAutoMap::Query();
        //Assert
        $this->assertTrue($php->get->foo == null);
    }

    public function testEmpty() {
        //Arrange
        $_GET["foo"] = "";
        //Act
        $php = \BTRAutoMap::Query();
        //Assert
        $this->assertTrue($php->get->foo == "");
    }

    public function testNothing() {
        //Act
        $php = \BTRAutoMap::Query();
        //Assert
        $this->assertTrue(!is_null($php->get));
        $this->assertTrue(count((array)$php->get) == 0);
    }

    public function testScalar() {
        //Arrange
        $_GET["foo"] = 5;
        //Act
        $php = \BTRAutoMap::Query();
        //Assert
        $this->assertTrue($php->get->foo == 5);
    }

}

?>