<?php
namespace TweeCdn\Hash;
use DirectoryIterator, RecursiveDirectoryIterator, RecursiveIteratorIterator;

class Collector
{
	protected $path = '';

	public function __construct($path)
	{
		$this->path = rtrim($path, DIRECTORY_SEPARATOR);
	}

	public function collect() : array
	{
		$hashes = [];
		foreach (new DirectoryIterator($this->path) as $folder) {
			if ($folder->isDot()) continue;
			if (!$folder->isDir()) continue;
			$iterator = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($folder->getPathname()),
                RecursiveIteratorIterator::CHILD_FIRST
            );
            foreach ($iterator as $item) {
            	if (!$item->isFile()) continue;
            	$name = str_replace($this->path, '', (string)$item);
            	$hash = md5_file((string)$item);
            	$hashes[$name] = $hash;
            }
		}
		return $hashes;
	}
}
