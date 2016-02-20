<?php

/**
 * The constants define which part should be used. Possible are:
 * __BETTERPHP_AUTOMAP__
 * __BETTERPHP_ALIAS__
 * __BETTERPHP_FILTER__
 * The value will not be checked
 */
if (defined("__BETTERPHP_AUTOMAP__") || defined("__BETTERPHP_ALL__")) {
    require_once __DIR__ . '/automap/automap.php';
}
if (defined("__BETTERPHP_ALIAS__") || defined("__BETTERPHP_ALL__")) {
    require_once __DIR__ . '/alias/aliasstring.php';
    require_once __DIR__ . '/alias/aliasarray.php';
}
if (defined("__BETTERPHP_FILTER__") || defined("__BETTERPHP_ALL__")) {
     require_once __DIR__ . '/autofilter/autofilter.php';
}
?>