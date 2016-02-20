<?php

/**
 * Automatic mapping of superblobal arrays into the $php array
 */
class AutoMap {

    /**
     * Convert an array to a object
     * @param array $input
     * @return \stdClass
     */
    private static function ArrayToObject($input) {
        if (!isset($input) || is_null($input) || !is_array($input) || count($input) == 0) {
            return array();
        }
        $object = new \stdClass();
        foreach ($input as $key => $value) {
            $key = strtolower($key);
            if (is_array($value)) {
                $object->{$key} = \AutoMap::ArrayToObject($value);
            } else {
                $object->{$key} = $value;
            }
        }
        return $object;
    }

    /**
     * Will map $_POST, $_GET $_FILES $_SERVER $_SESSION (if started) $_COOKIE $_REQUEST and $_ENV to the $php object
     * @global \stdClass $php
     * @return \stdClass $php
     */
    public static function Query() {
        global $php;
        $php = new \stdClass();
        $globals = array(
            "post" => $_POST,
            "get" => $_GET,
            "files" => $_FILES,
            "server" => $_SERVER,
            "session" => isset($_SESSION) ? $_SESSION : null,
            "cookie" => $_COOKIE,
            "request" => $_REQUEST,
            "env" => $_ENV
        );
        try {
            foreach ($globals as $key => $value) {
                $php->{$key} = \AutoMap::ArrayToObject($value);
            }
        } catch (\Exception $ex) {
            if (error_reporting() == E_ALL) {
                error_log($ex->getTrace());
            }
        }
        return $php;
    }

}

?>