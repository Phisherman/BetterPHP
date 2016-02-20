<?php

class AliasStringTest extends PHPUnit_Framework_TestCase {

    public function testContainsTrue() {
        $got = \contains("hallo", "l");
        $this->assertTrue($got);
    }

    public function testContainsTrueIgnoreCase() {
        $got = \contains("hallo", "L", true);
        $this->assertTrue($got);
    }

    public function testContainsTrueIgnoreCaseNotSet() {
        $got = \contains("hallo", "L");
        $this->assertFalse($got);
    }

    public function testContainsFalse() {
        $got = \contains("hallo", "x!");
        $this->assertFalse($got);
    }

    public function testContainsFalse2() {
        $got = \contains("hallo", "");
        $this->assertFalse($got);
    }

    public function testContainsNeedleInt() {
        $got = \contains("hallo5", 5);
        $this->assertTrue($got);
    }

    public function testStartsWithTrue() {
        $got = \StartsWith("hallo", "h");
        $this->assertTrue($got);
    }

    public function testStartsWithTrueIgnoreCase() {
        $got = \StartsWith("hallo", "HAL", true);
        $this->assertTrue($got);
    }

    public function testStartsWithNeedleTooLong() {
        $got = \StartsWith("hallo", "toolong");
        $this->assertFalse($got);
    }

    public function testStartsWithEmptyNeedle() {
        $got = \StartsWith("hallo", "");
        $this->assertFalse($got);
    }

    public function testStartsWithEmptyHaystack() {
        $got = \StartsWith("", "x");
        $this->assertFalse($got);
    }

    public function testEndsWithEmptyNeedle() {
        $got = \EndsWith("hallo", "");
        $this->assertFalse($got);
    }

    public function testEndsWithEmptyHaystack() {
        $got = \EndsWith("", "x");
        $this->assertFalse($got);
    }

    public function testEndsWithTrue() {
        $got = \EndsWith("test", "st");
        $this->assertTrue($got);
    }

    public function testEndsWithTrueIgnoreCase() {
        $got = \EndsWith("hallo", "LO", true);
        $this->assertTrue($got);
    }

    public function testEndsWithNeedleTooLong() {
        $got = \EndsWith("hallo", "LOOOO", true);
        $this->assertFalse($got);
    }

    public function testEndsWithNeedleTooLong2() {
        $got = \EndsWith("hallo", "LOOOOOO", true);
        $this->assertFalse($got);
    }

    public function testEndsWithFalse() {
        $got = \EndsWith("hallo", "XY", true);
        $this->assertFalse($got);
    }

    public function testEndsWithFalse2IgnoreCase() {
        $got = \EndsWith("hallo", "LL", true);
        $this->assertFalse($got);
    }

    public function testEndsWithFalse2() {
        $got = \EndsWith("hallo", "LL");
        $this->assertFalse($got);
    }

    public function testEndsWithFalse3() {
        $got = \EndsWith("hallo", "ha");
        $this->assertFalse($got);
    }

}

?>