<?php
namespace Twee\View\Helper\Cdn;

class Release extends AbstractCdn
{
	const RELEASE = 'release';
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

	public function __invoke($filename)
	{
		$items = explode(self::SEPARATOR, $filename);
		array_shift($items);
		if (count($items) <= 1) return $filename;
		$type = array_shift($items);
		array_unshift($items, $this->getRelease());
		array_unshift($items, $type);
		array_unshift($items, '');
		return $this->decorate(join(self::SEPARATOR, $items));
	}
}