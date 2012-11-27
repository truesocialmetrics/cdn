<?php
namespace TweeCdn\View\Helper\Cdn;

class Release extends AbstractCdn
{
	const SEPARATOR = '/';

	private $release;

	public function setRelease($release)
	{
		$this->release = $release;
	}

	public function getRelease()
	{
		return $this->release;
	}

	protected function injectUniqueMarker($filename, $marker)
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

	public function decorate($filename)
	{
		return $this->injectUniqueMarker($filename, $this->getRelease());
	}
}