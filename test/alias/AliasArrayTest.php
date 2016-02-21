<?php

class AliasArrayTest extends PHPUnit_Framework_TestCase {

    public function testArrayContainsTrue() {
        $got = \BTRArray::ArrayContains(array("test"), "te");
        $this->assertTrue($got);
    }

    public function testArrayContainsTrueDeepArray() {
        $data = array("test", array("subtest", "needle"));
        $got = \BTRArray::ArrayContains($data, "needle");
        $this->assertTrue($got);
    }

    public function testArrayContainsTrueIgnoreCase() {
        $got = \BTRArray::ArrayContains(array("test"), "TES", true);
        $this->assertTrue($got);
    }

    public function testArrayContainsNeedleEmpty() {
        $got = \BTRArray::ArrayContains(array("test"), "");
        $this->assertFalse($got);
    }

    public function testArrayContainsHaystackEmpty() {
        $got = \BTRArray::ArrayContains(array(), "x");
        $this->assertFalse($got);
    }

    public function testArrayContainsIterativeTrue() {
        $got = \BTRArray::ArrayContainsIterative(array("test"), "te");
        $this->assertTrue($got);
    }

    public function testArrayContainsIterativeTrueDeepArray() {
        $data = array("test", array("subtest", "subtest"), "subtest", array("subtest", "subtest", array("subtest", "needle")));
        $got = \BTRArray::ArrayContainsIterative($data, "needle");
        $this->assertTrue($got);
    }

    public function testArrayContainsIterativeTrueIgnoreCase() {
        $got = \BTRArray::ArrayContainsIterative(array("test"), "TES", true);
        $this->assertTrue($got);
    }

    public function testArrayContainsIterativeNeedleEmpty() {
        $got = \BTRArray::ArrayContainsIterative(array("test"), "");
        $this->assertFalse($got);
    }

    public function testArrayContainsIterativeHaystackEmpty() {
        $got = \BTRArray::ArrayContainsIterative(array(), "x");
        $this->assertFalse($got);
    }

    public function testArrayStartsWithTrue() {
        $got = \BTRArray::ArrayStartsWith(array("test"), "te");
        $this->assertTrue($got);
    }

    public function testArrayStartsWithTrueDeepArray() {
        $data = array("test", array("subtest", "needle"));
        $got = \BTRArray::ArrayStartsWith($data, "sub");
        $this->assertTrue($got);
    }

    public function testArrayStartsWithTrueIgnoreCase() {
        $got = \BTRArray::ArrayStartsWith(array("test"), "TE", true);
        $this->assertTrue($got);
    }

    public function testArrayStartsWithNeedleEmpty() {
        $got = \BTRArray::ArrayStartsWith(array("test"), "");
        $this->assertFalse($got);
    }

    public function testArrayStartsWithHaystackEmpty() {
        $got = \BTRArray::ArrayStartsWith(array(), "x");
        $this->assertFalse($got);
    }

    public function testArrayEndsWithTrue() {
        $got = \BTRArray::ArrayEndsWith(array("test"), "st");
        $this->assertTrue($got);
    }

    public function testArrayEndsWithTrueDeepArray() {
        $data = array("test", array("subtest", "needle"));
        $got = \BTRArray::ArrayEndsWith($data, "test");
        $this->assertTrue($got);
    }

    public function testArrayEndsWithTrueIgnoreCase() {
        $got = \BTRArray::ArrayEndsWith(array("test"), "ST", true);
        $this->assertTrue($got);
    }

    public function testArrayEndsWithNeedleEmpty() {
        $got = \BTRArray::ArrayEndsWith(array("test"), "");
        $this->assertFalse($got);
    }

    public function testArrayEndsWithHaystackEmpty() {
        $got = \BTRArray::ArrayEndsWith(array(), "x");
        $this->assertFalse($got);
    }

    public function testArrayEndsWithSubObject() {
        $dummy = new \stdClass();
        $dummy->foo = "dummy";
        $got = \BTRArray::ArrayEndsWith(array("test", $dummy), "my");
        $this->assertTrue($got);
    }

    public function testArrayContainsSubObject() {
        $dummy = new \stdClass();
        $dummy->foo = "dummy";
        $got = \BTRArray::ArrayContains(array("test", $dummy), "mm");
        $this->assertTrue($got);
    }

    public function testArrayStartsWithSubObject() {
        $dummy = new \stdClass();
        $dummy->foo = "dummy";
        $got = \BTRArray::ArrayStartsWith(array("test", $dummy), "dumm");
        $this->assertTrue($got);
    }

    public function testArrayMatchNeedleEmpty() {
        $got = \BTRArray::ArrayMatch(array("test"), "");
        $this->assertFalse($got);
    }

    public function testArrayMatchHaystackEmpty() {
        $got = \BTRArray::ArrayMatch(array(), "x");
        $this->assertFalse($got);
    }

    public function testArrayMatchSubObject() {
        $dummy = new \stdClass();
        $dummy->foo = "dummy";
        $got = \BTRArray::ArrayMatch(array("test", $dummy), "/my/");
        $this->assertTrue($got);
    }

    public function testArrayMatchTrueDeepArray() {
        $data = array("test", array("subtest", "needle"));
        $got = \BTRArray::ArrayMatch($data, "/[s]+/");
        $this->assertTrue($got);
    }

}

?>