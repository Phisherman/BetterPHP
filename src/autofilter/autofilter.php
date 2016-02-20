<?php

/**
 * Filter malicous content from superglobals
 */
class AutoFilter {

    public static function Filter($data) {
        $cleaned = array();
        if (empty($data)) {
            return $data;
        }
        if (!is_array($data)) {
            return \AutoFilter::Clean($data);
        }
        foreach ($data as $key => $value) {
            $sub = null;
            $cleanedKey = \AutoFilter::Clean($key);
            if (!is_array($value)) {
                $sub = \AutoFilter::Clean($value);
            } else {
                $sub = \AutoFilter::Filter($value);
            }
            $cleaned[$cleanedKey] = $sub;
        }

        return $cleaned;
    }

    private static function Clean($value) {
        if (is_array($value) || is_object($value)) {
            return null;
        }
        return $value;
    }

}

?>