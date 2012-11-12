<?php
namespace Twee\View\Helper\Cdn;
use InvalidArgumentException;

class Simple extends AbstractCdn
{
	public function __invoke($filename)
	{
		$path = $this->getPublicDir() . $filename;
		if (!file_exists($path)) throw new InvalidArgumentException('File ' . $filename . ' not found');
		return $this->decorate($filename . '?' . filemtime($path));
	}
}