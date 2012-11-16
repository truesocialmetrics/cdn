#!/usr/bin/env php
<?php
if (__DIR__ . '/../autoload_register.php') {
	include_once __DIR__ . '/../autoload_register.php';
}
if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
	include_once __DIR__ . '/../vendor/autoload.php';
}
if (file_exists(__DIR__ . '/../autoload.php')) {
	include_once __DIR__ . '/../autoload.php';
}

$collector = new TweeCdn\Hash\Collector(__DIR__ . '/../../../public');
$hashes = $collector->collect();

$writer = new Zend\Config\Writer\PhpArray();
$writer->toFile(__DIR__ . '/../tmp/hashes.php', $hashes);