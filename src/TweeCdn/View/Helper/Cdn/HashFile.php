<?php
namespace TweeCdn\View\Helper\Cdn;

class HashFile extends Release
{
	const SEPARATOR = '/';

	private array $hashes = [];

	private $filename = '';

	public function setFileName(string $filename) : void
	{
		$this->filename = $filename;
	}

	private function getHashes() : array
	{
		if (!$this->hashes) {
			$this->hashes = file_exists($this->filename) ? include $this->filename : ['loaded' => 'loaded'];
		}

		return $this->hashes;
	}

	public function decorate(string $filename) : string
	{
		$hashes = $this->getHashes();
		if (array_key_exists($filename, $hashes)) {
			$marker = $hashes[$filename];
		} else {
			$marker = md5_file($this->getPublicDir() . $filename);
		}
		return $this->injectUniqueMarker($filename, $marker);
	}
}
