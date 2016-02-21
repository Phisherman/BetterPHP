<?php

/**
 * The constants define which part should be used. Possible are:
 * __BUTTERPHP_AUTOMAP__
 * __BUTTERPHP_ALIAS__
 * __BUTTERPHP_FILTER__
 * The value will not be checked
 */
if (defined("__BUTTERPHP_AUTOMAP__") || defined("__BUTTERPHP_ALL__")) {
    require_once __DIR__ . '/automap/automap.php';
}
if (defined("__BUTTERPHP_ALIAS__") || defined("__BUTTERPHP_ALL__")) {
    require_once __DIR__ . '/alias/aliasstring.php';
    require_once __DIR__ . '/alias/aliasarray.php';
}
if (defined("__BUTTERPHP_FILTER__") || defined("__BUTTERPHP_ALL__")) {
     require_once __DIR__ . '/autofilter/autofilter.php';
}
?>