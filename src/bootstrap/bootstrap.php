<?php

/**
 * Bootstraps a system 
 */
class BTRBootStrap {

    /**
     * The Modules
     * @var mixed[]
     */
    private static $units = array();

    /**
     * the bootstrapped dir
     * @var string
     */
    private $dir = null;

    /**
     * Konstructor
     * @param string $dir the dir to search the units in
     */
    public function __construct($dir) {
        if (file_exists($dir)) {
            $this->dir = $dir;
        } else {
            $this->dir = "";
        }
    }

    /**
     * Start the bootstrapping process
     * @return boolean
     */
    private function Bootstrap() {
        if (!empty($this->dir)) {
            $files = scandir($this->dir, SCANDIR_SORT_ASCENDING);
            $units = array();
            foreach ($files as $key => $file) {
                if (\BTRString::EndsWith($file, ".php")) {
                    $path = $this->dir . "$file";
                    include $path;
                    $units[] = $path;
                }
            }
            foreach ($units as $value) {
                $name = basename($value, ".php");
                $unit = new $name();
                $this->AddUnit($unit);
            }
            return true;
        } else {
            return false;
        }
    }

    /**
     * Adds a unit to the unit list
     * @param mixded $object
     * @return boolean
     */
    private function AddUnit($object) {
        $implements = array_keys(class_implements($object));
        $interface = "";
        if (count($implements) == 0) {
            return false;
        } else {
            $interface = $implements[0];
        }
        if (!isset(\BootStrap::$units[$interface])) {
            \BootStrap::$units[$interface] = array();
        }
        if (!in_array($object, \BootStrap::$units[$interface])) {
            \BootStrap::$units[$interface][get_class($object)] = $object;
        }
        return true;
    }

    /**
     * Get all units
     * @return mixed[]
     */
    public function GetUnits() {
        if (count(\BootStrap::$units) == 0) {
            $this->Bootstrap();
        }
        return \BootStrap::$units;
    }

    /**
     * Get a bootstrapped plugin by its name
     * @param string $unit the unit class name
     * @return null | mixed
     */
    public function GetUnit($unit) {
        if (count(\BootStrap::$units) == 0) {
            $this->Bootstrap();
        }
        $units = $this->GetUnits();
        foreach ($units as $value) {
            if (is_array($value)) {
                $keys = array_keys($value);
                if (in_array($unit, $keys)) {
                    return $value[$unit];
                }
            }
        }
        return null;
    }
    /**
     * Get the Units by their implementation
     * @param string $implementation the name of the implementation (Interface Name)
     * @return null | array
     */
    public function GetUnitsByImplementation($implementation) {
        if (empty($implementation)) {
            return null;
        }
        $units = $this->GetUnits();
        foreach ($units as $key => $value) {
            if ($key === $implementation && is_array($value)) {
                return $units;
            }
        }
        return null;
    }

}
