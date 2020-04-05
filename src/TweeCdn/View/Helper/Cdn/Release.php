<?php
namespace TweeCdn\View\Helper\Cdn;

class Release extends AbstractCdn
{
	const SEPARATOR = '/';

	private string $release = '';

	public function setRelease(string $release) : void
	{
		$this->release = $release;
	}

	public function getRelease() : string
	{
		return $this->release;
	}

	protected function injectUniqueMarker(string $filename, string $marker) : string
	{
		$items = explode(self::SEPARATOR, $filename);
		array_shift($items);
		if (count($items) <= 1) return $filename;
		$type = array_shift($items);
		array_unshift($items, $marker);
		array_unshift($items, $type);
		array_unshift($items, '');
		return join(self::SEPARATOR, $items);
	}

	public function decorate(string $filename) : string
	{
		return $this->injectUniqueMarker($filename, $this->getRelease());
	}
}
