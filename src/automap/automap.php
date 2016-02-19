<?php

class AutoMap {

    /**
     * Convert an array to a object
     * @param array $input
     * @return \stdClass
     */
    private static function ArrayToObject($input) {
        if (is_null($input) || !is_array($input) || count($input) == 0) {
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
        foreach ($globals as $key => $value) {
            $php->{$key} = \AutoMap::ArrayToObject($value);
        }
    }

}

$_POST["x"] = 5;
$_POST["y"] = array("5", "5253");
$_POST["fawf"] = array("key" => "value");
\AutoMap::Query();
?>