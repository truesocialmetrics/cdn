<?php
namespace TweeCdn\View\Helper\Cdn;

class Hash extends Release
{
	const SEPARATOR = '/';

	private array $hashes = [];

	public function setHashes(array $hashes) : void
	{
		$this->hashes = $hashes;
	}

	public function getHashes() : array
	{
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
