<?php

class AliasArrayTest extends PHPUnit_Framework_TestCase {

    public function testArrayContainsTrue() {
        $got = \ArrayContains(array("test"), "te");
        $this->assertTrue($got);
    }

    public function testArrayContainsTrueDeepArray() {
        $data = array("test", array("subtest", "needle"));
        $got = \ArrayContains($data, "needle");
        $this->assertTrue($got);
    }

    public function testArrayContainsTrueIgnoreCase() {
        $got = \ArrayContains(array("test"), "TES", true);
        $this->assertTrue($got);
    }

    public function testArrayContainsNeedleEmpty() {
        $got = \ArrayContains(array("test"), "");
        $this->assertFalse($got);
    }

    public function testArrayContainsHaystackEmpty() {
        $got = \ArrayContains(array(), "x");
        $this->assertFalse($got);
    }

    public function testArrayContainsIterativeTrue() {
        $got = \ArrayContainsIterative(array("test"), "te");
        $this->assertTrue($got);
    }

    public function testArrayContainsIterativeTrueDeepArray() {
        $data = array("test", array("subtest", "subtest"), "subtest", array("subtest", "subtest", array("subtest", "needle")));
        $got = \ArrayContainsIterative($data, "needle");
        $this->assertTrue($got);
    }

    public function testArrayContainsIterativeTrueIgnoreCase() {
        $got = \ArrayContainsIterative(array("test"), "TES", true);
        $this->assertTrue($got);
    }

    public function testArrayContainsIterativeNeedleEmpty() {
        $got = \ArrayContainsIterative(array("test"), "");
        $this->assertFalse($got);
    }

    public function testArrayContainsIterativeHaystackEmpty() {
        $got = \ArrayContainsIterative(array(), "x");
        $this->assertFalse($got);
    }

    public function testArrayStartsWithTrue() {
        $got = \ArrayStartsWith(array("test"), "te");
        $this->assertTrue($got);
    }

    public function testArrayStartsWithTrueDeepArray() {
        $data = array("test", array("subtest", "needle"));
        $got = \ArrayStartsWith($data, "sub");
        $this->assertTrue($got);
    }

    public function testArrayStartsWithTrueIgnoreCase() {
        $got = \ArrayStartsWith(array("test"), "TE", true);
        $this->assertTrue($got);
    }

    public function testArrayStartsWithNeedleEmpty() {
        $got = \ArrayStartsWith(array("test"), "");
        $this->assertFalse($got);
    }

    public function testArrayStartsWithHaystackEmpty() {
        $got = \ArrayStartsWith(array(), "x");
        $this->assertFalse($got);
    }

    public function testArrayEndsWithTrue() {
        $got = \ArrayEndsWith(array("test"), "st");
        $this->assertTrue($got);
    }

    public function testArrayEndsWithTrueDeepArray() {
        $data = array("test", array("subtest", "needle"));
        $got = \ArrayEndsWith($data, "test");
        $this->assertTrue($got);
    }

    public function testArrayEndsWithTrueIgnoreCase() {
        $got = \ArrayEndsWith(array("test"), "ST", true);
        $this->assertTrue($got);
    }

    public function testArrayEndsWithNeedleEmpty() {
        $got = \ArrayEndsWith(array("test"), "");
        $this->assertFalse($got);
    }

    public function testArrayEndsWithHaystackEmpty() {
        $got = \ArrayEndsWith(array(), "x");
        $this->assertFalse($got);
    }

    public function testArrayEndsWithSubObject() {
        $dummy = new \stdClass();
        $dummy->foo = "dummy";
        $got = \ArrayEndsWith(array("test", $dummy), "my");
        $this->assertTrue($got);
    }

    public function testArrayContainsSubObject() {
        $dummy = new \stdClass();
        $dummy->foo = "dummy";
        $got = \ArrayContains(array("test", $dummy), "mm");
        $this->assertTrue($got);
    }

    public function testArrayStartsWithSubObject() {
        $dummy = new \stdClass();
        $dummy->foo = "dummy";
        $got = \ArrayStartsWith(array("test", $dummy), "dumm");
        $this->assertTrue($got);
    }

    public function testArrayMatchNeedleEmpty() {
        $got = \ArrayMatch(array("test"), "");
        $this->assertFalse($got);
    }

    public function testArrayMatchHaystackEmpty() {
        $got = \ArrayMatch(array(), "x");
        $this->assertFalse($got);
    }

    public function testArrayMatchSubObject() {
        $dummy = new \stdClass();
        $dummy->foo = "dummy";
        $got = \ArrayMatch(array("test", $dummy), "/my/");
        $this->assertTrue($got);
    }

    public function testArrayMatchTrueDeepArray() {
        $data = array("test", array("subtest", "needle"));
        $got = \ArrayMatch($data, "/[s]+/");
        $this->assertTrue($got);
    }

}

?>