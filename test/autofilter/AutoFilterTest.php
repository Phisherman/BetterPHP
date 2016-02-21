<?php

class AutoFilterTest extends PHPUnit_Framework_TestCase {

    public function testFilterEmpty() {
        $got = \BTRAutoFilter::Filter(array());
        $this->assertTrue(empty($got));
    }

    public function testFilterScriptBlock() {
        $got = \BTRAutoFilter::Filter(array("<script>"));
        $this->assertTrue($got[0] === "");
    }

    public function testFilterNoArrayScriptBlockInKey() {
        $got = \BTRAutoFilter::Filter(array("<script>" => "foo"));
        $this->assertTrue(array_keys($got)[0] === "");      
        $this->assertTrue(array_values($got)[0] === "foo");
    }

    public function testFilterNoArrayScriptBlock() {
        $got = \BTRAutoFilter::Filter("<script>");
        $this->assertTrue($got === "");
    }

    public function testFilterNoArrayNothingMalicous() {
        $got = \BTRAutoFilter::Filter("script");
        $this->assertTrue($got === "script");
    }

    public function testFilterNoArrayNothingMalicousInt() {
        $got = \BTRAutoFilter::Filter(5);
        $this->assertTrue(intval($got) === 5);
    }

    public function testFilterNoArrayNothingMalicousFloat() {
        $got = \BTRAutoFilter::Filter(1.556);
        $this->assertTrue(floatval($got) === 1.556);
    }

}

?>