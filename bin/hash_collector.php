#!/usr/bin/env php
<?php
include_once __DIR__ . '/../autoload_register.php';
include_once __DIR__ . '/../vendor/autoload.php';

$collector = new Twee\Hash\Collector(__DIR__ . '/../../../public');
$hashes = $collector->collect();

$writer = new Zend\Config\Writer\PhpArray();
$writer->toFile(__DIR__ . '/../tmp/hashes.php', $hashes);