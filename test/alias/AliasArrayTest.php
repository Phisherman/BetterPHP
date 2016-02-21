<?php

class AliasArrayTest extends PHPUnit_Framework_TestCase {

    public function testContainsTrue() {
        $got = \BTRArray::Contains(array("test"), "te");
        $this->assertTrue($got);
    }

    public function testContainsTrueDeepArray() {
        $data = array("test", array("subtest", "needle"));
        $got = \BTRArray::Contains($data, "needle");
        $this->assertTrue($got);
    }

    public function testContainsTrueIgnoreCase() {
        $got = \BTRArray::Contains(array("test"), "TES", true);
        $this->assertTrue($got);
    }

    public function testContainsNeedleEmpty() {
        $got = \BTRArray::Contains(array("test"), "");
        $this->assertFalse($got);
    }

    public function testContainsHaystackEmpty() {
        $got = \BTRArray::Contains(array(), "x");
        $this->assertFalse($got);
    }

    public function testContainsIterativeTrue() {
        $got = \BTRArray::ContainsIterative(array("test"), "te");
        $this->assertTrue($got);
    }

    public function testContainsIterativeTrueDeepArray() {
        $data = array("test", array("subtest", "subtest"), "subtest", array("subtest", "subtest", array("subtest", "needle")));
        $got = \BTRArray::ContainsIterative($data, "needle");
        $this->assertTrue($got);
    }

    public function testContainsIterativeTrueIgnoreCase() {
        $got = \BTRArray::ContainsIterative(array("test"), "TES", true);
        $this->assertTrue($got);
    }

    public function testContainsIterativeNeedleEmpty() {
        $got = \BTRArray::ContainsIterative(array("test"), "");
        $this->assertFalse($got);
    }

    public function testContainsIterativeHaystackEmpty() {
        $got = \BTRArray::ContainsIterative(array(), "x");
        $this->assertFalse($got);
    }

    public function testStartsWithTrue() {
        $got = \BTRArray::StartsWith(array("test"), "te");
        $this->assertTrue($got);
    }

    public function testStartsWithTrueDeepArray() {
        $data = array("test", array("subtest", "needle"));
        $got = \BTRArray::StartsWith($data, "sub");
        $this->assertTrue($got);
    }

    public function testStartsWithTrueIgnoreCase() {
        $got = \BTRArray::StartsWith(array("test"), "TE", true);
        $this->assertTrue($got);
    }

    public function testStartsWithNeedleEmpty() {
        $got = \BTRArray::StartsWith(array("test"), "");
        $this->assertFalse($got);
    }

    public function testStartsWithHaystackEmpty() {
        $got = \BTRArray::StartsWith(array(), "x");
        $this->assertFalse($got);
    }

    public function testEndsWithTrue() {
        $got = \BTRArray::EndsWith(array("test"), "st");
        $this->assertTrue($got);
    }

    public function testEndsWithTrueDeepArray() {
        $data = array("test", array("subtest", "needle"));
        $got = \BTRArray::EndsWith($data, "test");
        $this->assertTrue($got);
    }

    public function testEndsWithTrueIgnoreCase() {
        $got = \BTRArray::EndsWith(array("test"), "ST", true);
        $this->assertTrue($got);
    }

    public function testEndsWithNeedleEmpty() {
        $got = \BTRArray::EndsWith(array("test"), "");
        $this->assertFalse($got);
    }

    public function testEndsWithHaystackEmpty() {
        $got = \BTRArray::EndsWith(array(), "x");
        $this->assertFalse($got);
    }

    public function testEndsWithSubObject() {
        $dummy = new \stdClass();
        $dummy->foo = "dummy";
        $got = \BTRArray::EndsWith(array("test", $dummy), "my");
        $this->assertTrue($got);
    }

    public function testContainsSubObject() {
        $dummy = new \stdClass();
        $dummy->foo = "dummy";
        $got = \BTRArray::Contains(array("test", $dummy), "mm");
        $this->assertTrue($got);
    }

    public function testStartsWithSubObject() {
        $dummy = new \stdClass();
        $dummy->foo = "dummy";
        $got = \BTRArray::StartsWith(array("test", $dummy), "dumm");
        $this->assertTrue($got);
    }

    public function testMatchNeedleEmpty() {
        $got = \BTRArray::Match(array("test"), "");
        $this->assertFalse($got);
    }

    public function testMatchHaystackEmpty() {
        $got = \BTRArray::Match(array(), "x");
        $this->assertFalse($got);
    }

    public function testMatchSubObject() {
        $dummy = new \stdClass();
        $dummy->foo = "dummy";
        $got = \BTRArray::Match(array("test", $dummy), "/my/");
        $this->assertTrue($got);
    }

    public function testMatchTrueDeepArray() {
        $data = array("test", array("subtest", "needle"));
        $got = \BTRArray::Match($data, "/[s]+/");
        $this->assertTrue($got);
    }

}

?>