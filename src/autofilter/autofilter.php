<?php

/**
 * Filter malicous content from arrays
 */
class BTRAutoFilter {
    /**
     * Filters the malicous content (script blogs) from the given data
     * @param mixed $data
     * @return mixed
     */
    public static function Filter($data) {
        $cleaned = array();
        if (empty($data)) {
            return $data;
        }
        if (!is_array($data)) {
            return \BTRAutoFilter::Clean($data);
        }
        foreach ($data as $key => $value) {
            $sub = null;
            $cleanedKey = \BTRAutoFilter::Clean($key);
            if (!is_array($value)) {
                $sub = \BTRAutoFilter::Clean($value);
            } else {
                $sub = \BTRAutoFilter::Filter($value);
            }
            $cleaned[$cleanedKey] = $sub;
        }

        return $cleaned;
    }
    /**
     * Cleans a vlaue
     * @param string $value
     * @return string
     */
    private static function Clean($value) {
        if (is_array($value) || is_object($value)) {
            return null;
        }
        return strip_tags($value);
    }

}

?>