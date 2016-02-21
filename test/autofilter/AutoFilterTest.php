<?php

class AutoFilterTest extends PHPUnit_Framework_TestCase {

    public function testFilterEmpty() {
        $got = \AutoFilter::Filter(array());
        $this->assertTrue(empty($got));
    }

    public function testFilterScriptBlock() {
        $got = \AutoFilter::Filter(array("<script>"));
        $this->assertTrue($got[0] === "");
    }

    public function testFilterNoArrayScriptBlockInKey() {
        $got = \AutoFilter::Filter(array("<script>" => "foo"));
        $this->assertTrue(array_keys($got)[0] === "");      
        $this->assertTrue(array_values($got)[0] === "foo");
    }

    public function testFilterNoArrayScriptBlock() {
        $got = \AutoFilter::Filter("<script>");
        $this->assertTrue($got === "");
    }

    public function testFilterNoArrayNothingMalicous() {
        $got = \AutoFilter::Filter("script");
        $this->assertTrue($got === "script");
    }

    public function testFilterNoArrayNothingMalicousInt() {
        $got = \AutoFilter::Filter(5);
        $this->assertTrue(intval($got) === 5);
    }

    public function testFilterNoArrayNothingMalicousFloat() {
        $got = \AutoFilter::Filter(1.556);
        $this->assertTrue(floatval($got) === 1.556);
    }

}

?>