<?php

class AliasStringTest extends PHPUnit_Framework_TestCase {

    public function testContainsTrue() {
        $got = \BTRString::Contains("hallo", "l");
        $this->assertTrue($got);
    }

    public function testContainsTrueIgnoreCase() {
        $got = \BTRString::Contains("hallo", "L", true);
        $this->assertTrue($got);
    }

    public function testContainsTrueIgnoreCaseNotSet() {
        $got = \BTRString::Contains("hallo", "L");
        $this->assertFalse($got);
    }

    public function testContainsFalse() {
        $got = \BTRString::Contains("hallo", "x!");
        $this->assertFalse($got);
    }

    public function testContainsFalse2() {
        $got = \BTRString::Contains("hallo", "");
        $this->assertFalse($got);
    }

    public function testContainsNeedleInt() {
        $got = \BTRString::Contains("hallo5", 5);
        $this->assertTrue($got);
    }

    public function testStartsWithTrue() {
        $got = \BTRString::StartsWith("hallo", "h");
        $this->assertTrue($got);
    }

    public function testStartsWithTrueIgnoreCase() {
        $got = \BTRString::StartsWith("hallo", "HAL", true);
        $this->assertTrue($got);
    }

    public function testStartsWithNeedleTooLong() {
        $got = \BTRString::StartsWith("hallo", "toolong");
        $this->assertFalse($got);
    }

    public function testStartsWithEmptyNeedle() {
        $got = \BTRString::StartsWith("hallo", "");
        $this->assertFalse($got);
    }

    public function testStartsWithEmptyHaystack() {
        $got = \BTRString::StartsWith("", "x");
        $this->assertFalse($got);
    }

    public function testEndsWithEmptyNeedle() {
        $got = \BTRString::EndsWith("hallo", "");
        $this->assertFalse($got);
    }

    public function testEndsWithEmptyHaystack() {
        $got = \BTRString::EndsWith("", "x");
        $this->assertFalse($got);
    }

    public function testEndsWithTrue() {
        $got = \BTRString::EndsWith("test", "st");
        $this->assertTrue($got);
    }

    public function testEndsWithTrueIgnoreCase() {
        $got = \BTRString::EndsWith("hallo", "LO", true);
        $this->assertTrue($got);
    }

    public function testEndsWithNeedleTooLong() {
        $got = \BTRString::EndsWith("hallo", "LOOOO", true);
        $this->assertFalse($got);
    }

    public function testEndsWithNeedleTooLong2() {
        $got = \BTRString::EndsWith("hallo", "LOOOOOO", true);
        $this->assertFalse($got);
    }

    public function testEndsWithFalse() {
        $got = \BTRString::EndsWith("hallo", "XY", true);
        $this->assertFalse($got);
    }

    public function testEndsWithFalse2IgnoreCase() {
        $got = \BTRString::EndsWith("hallo", "LL", true);
        $this->assertFalse($got);
    }

    public function testEndsWithFalse2() {
        $got = \BTRString::EndsWith("hallo", "LL");
        $this->assertFalse($got);
    }

    public function testEndsWithFalse3() {
        $got = \BTRString::EndsWith("hallo", "ha");
        $this->assertFalse($got);
    }

    public function testMatchNoMatch() {
        $got = \BTRString::Match("foo", "/\d+/");
        $this->assertFalse($got);
    }

    public function testMatchDelimiterMissing() {
        $got = \BTRString::Match("foo", "f");
        $this->assertFalse($got);
    }

    public function testMatchLiteralMatch() {
        $got = \BTRString::Match("foo", "/f/");
        $this->assertTrue($got);
    }

    public function testMatchRegexMatch() {
        $got = \BTRString::Match("1337", "/\d+/");
        $this->assertTrue($got);
    }

}

?>