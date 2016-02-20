<?php

/**
 * Checks if a string contains a needle
 * @see strpos();
 * @param string $haystack the haystack to search in
 * @param string $needle the needle to search. No-String parameters will be converted using strval()!
 * @param bool $ignorecase Ignore case
 * @return boolean
 */
function Contains($haystack, $needle, $ignorecase = false) {
    if (empty($needle) || empty($haystack) || !is_string($haystack)) {
        return false;
    }
    if (!is_string($needle)) {
        $needle = strval($needle);
    }
    return $ignorecase === true ? strpos(strtolower($haystack), strtolower($needle)) !== false : strpos($haystack, $needle) !== false;
}

/**
 * Checks if a string starts with another string
 * @param type $haystack the haystack to search in
 * @param type $needle the string the haystack has to start with
 * @param bool $ignorecase Ignore case
 * @return boolean
 */
function StartsWith($haystack, $needle, $ignorecase = false) {
    if (empty($needle) || empty($haystack) || !is_string($haystack)) {
        return false;
    }
    if (!is_string($needle)) {
        $needle = strval($needle);
    }
    $haystackLength = strlen($haystack);
    $needleLength = strlen($needle);
    if ($needleLength > $haystackLength) {
        return false;
    }
    for ($i = 0; $i < $needleLength; $i++) {
        if (($ignorecase === true && strtolower($haystack[$i]) != strtolower($needle[$i])) || ($ignorecase === false && $haystack[$i] != $needle[$i])) {
            return false;
        }
    }
    return true;
}

/**
 * Checks if a string ends with another string
 * @param type $haystack the haystack to search in
 * @param type $needle the string the haystack has to start with
 * @param bool $ignorecase Ignore case
 * @return boolean
 */
function EndsWith($haystack, $needle, $ignorecase = false) {
    if (empty($needle) || empty($haystack) || !is_string($haystack)) {
        return false;
    }
    if (!is_string($needle)) {
        $needle = strval($needle);
    }
    $haystackLength = strlen($haystack);
    $needleLength = strlen($needle);
    if ($needleLength > $haystackLength) {
        return false;
    } 
    if ($ignorecase){
        $needle = strtolower($needle);
        $haystack = strtolower($haystack);
    }
    $index = strrpos($haystack, $needle);
    if ($index === false){
        return false;
    }    
    return $index + $needleLength == $haystackLength;
}

?>