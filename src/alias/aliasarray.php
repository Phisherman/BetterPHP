<?php

/**
 * Find a needle in a array, but not like in_array, b/c recursive.
 * @param array $haystack The haystack to search in
 * @param string $needle the needle to find
 * @param bool $ignorecase should the function work case insensitive?
 * @return boolean
 */
function ArrayContains($haystack, $needle, $ignorecase = false)
{
    if (empty($haystack) || empty($needle)) {
        return false;
    }
    foreach ($haystack as $value) {
        if (is_array($value) || is_object($value)) {
            $sub = \ArrayContains($value, $needle, $ignorecase);
        } else {
            $sub = \Contains($value, $needle, $ignorecase);
        }
        if ($sub) {
            return true;
        }
    }
    return false;
}

function ArrayContainsIterative($haystack, $needle, $ignorecase = false)
{
    if (empty($haystack) || empty($needle))
        return false;

    //saves all arrays
    $arrayPositions = [$haystack];

    for ($i = 0; $i < count($arrayPositions); $i++) {
        $currentArray = $arrayPositions[$i];

        foreach ($currentArray as $value)
            if (is_array($value))
                $arrayPositions[] = $value;
            else if (\Contains($value, $needle, $ignorecase))
                return true;
    }
    return false;
}

/**
 * Starts a value in the array with the given needle?
 * @param array $haystack The haystack to search in
 * @param string $needle the needle to find
 * @param bool $ignorecase should the function work case insensitive?
 * @return boolean
 */
function ArrayStartsWith($haystack, $needle, $ignorecase = false)
{
    if (empty($haystack) || empty($needle)) {
        return false;
    }
    foreach ($haystack as $value) {
        if (is_array($value) || is_object($value)) {
            $sub = \ArrayStartsWith($value, $needle, $ignorecase);
        } else {
            $sub = \StartsWith($value, $needle, $ignorecase);
        }
        if ($sub) {
            return true;
        }
    }
    return false;
}

/**
 * Ends a value in the array with the given needle?
 * @param array $haystack The haystack to search in
 * @param string $needle the needle to find
 * @param bool $ignorecase should the function work case insensitive?
 * @return boolean
 */
function ArrayEndsWith($haystack, $needle, $ignorecase = false)
{
    if (empty($haystack) || empty($needle) || !is_string($needle)) {
        return false;
    }
    foreach ($haystack as $value) {
        if (is_array($value) || is_object($value)) {
            $sub = \ArrayStartsWith($value, $needle, $ignorecase);
        } else {
            $sub = \EndsWith($value, $needle, $ignorecase);
        }
        if ($sub) {
            return true;
        }
    }
    return false;
}

?>