<?php
$rootPath = realpath(dirname(__DIR__));
$testsPath = "$rootPath/tests";

if (is_readable($testsPath . '/TestConfiguration.php')) {
    require_once $testsPath . '/TestConfiguration.php';
} else {
    require_once $testsPath . '/TestConfiguration.php.dist';
}

$path = array(
    ZF2_PATH,
    get_include_path(),
);
set_include_path(implode(PATH_SEPARATOR, $path));

include_once __DIR__ . '/../autoload_register.php';
