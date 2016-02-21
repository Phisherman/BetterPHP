<?php

class BootStrapTest extends PHPUnit_Framework_TestCase {

    public function testIsSetUp0() {
        $bs = new \BTRBootStrap("notexisting");
        $this->assertTrue(count($bs->GetUnits()) == 0);
    }

    public function testIsSetUp1() {
        $bs = new \BTRBootStrap(__DIR__ . "/units/");
        $this->assertTrue(count($bs->GetUnits()) == 1);
    }

    public function testGetUnit() {
        $bs = new \BTRBootStrap(__DIR__ . "/units/");
        $got = $bs->GetUnit("TestPre");
        $this->assertTrue(!is_null($got));
        $this->assertTrue($got->Run() === "sauerkraut");
    }

    public function testGetUnitWrongName() {
        $bs = new \BTRBootStrap(__DIR__ . "/units/");
        $got = ($bs->GetUnit("NotGiven"));
        $this->assertTrue(is_null($got));
    }

    public function testGetUnitByImplementationWrongName() {
        $bs = new \BTRBootStrap(__DIR__ . "/units/");
        $got = $bs->GetUnitsByImplementation("NotGiven");
        $this->assertTrue(is_null($got));
    }

    public function testGetUnitByImplementation() {
        $bs = new \BTRBootStrap(__DIR__ . "/units/");
        $got = $bs->GetUnitsByImplementation("IPreUnit");     
        $this->assertTrue(!empty($got));
         $this->assertTrue(count($got) == 1);
    }

}

?>