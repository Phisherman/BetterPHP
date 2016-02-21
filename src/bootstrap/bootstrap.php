<?php

/**
 * Bootstraps a system 
 */
class BootStrap {

    private $units = array();
    private $dir = null;

    public function __construct($dir) {
        if (file_exists($dir)) {
            $this->dir = $dir;
        } else {
            $this->dir = "";
        }
    }

    private function Bootstrap() {
        if (!empty($this->dir)) {
            $files = scandir($this->dir, SCANDIR_SORT_ASCENDING);
            foreach ($files as $key => $file) {
                if (\BTRString::EndsWith($file, ".php")) {
                    $path = $this->dir . "$file";
                    $this->LoadUnit($path);
                }
            }
            return true;
        }
        else{
            return false;
        }
    }

    private function LoadUnit($path) {
        if (!file_exists($path)) {
            return false;
        } else {
            require_once $path;
            return true;
        }
    }

    public function AddUnit($object) {
        $implements = array_keys(class_implements($object));
        $interface = "";
        if (count($implements) == 0) {
            return false;
        } else {
            $interface = $implements[0];
        }
        if (!isset($this->units[$interface])) {
            $this->units[$interface] = array();
        }
        if (!in_array($object, $this->units[$interface])) {
            $this->units[$interface][get_class($object)] = $object;
        }
        return true;
    }

    public function GetUnits() {
        if (count($this->units) == 0) {
            $this->Bootstrap();
        }
        return $this->units;
    }

    public function GetUnit() {
        
    }

}
