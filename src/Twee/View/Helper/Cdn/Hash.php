<?php
namespace Twee\View\Helper\Cdn;

class Hash extends Release
{
	const SEPARATOR = '/';

	private $hashes = array();

	public function setHashes(array $hashes)
	{
		$this->hashes = $hashes;
	}

	public function getHashes()
	{
		return $this->hashes;
	}

	public function __invoke($filename)
	{
		$hashes = $this->getHashes();
		if (array_key_exists($filename, $hashes)) {
			$marker = $hashes[$filename];
		} else {
			$marker = md5_file($this->getPublicDir() . $filename);
		}
		return $this->decorate($this->injectUniqueMarker($filename, $marker));
	}
}