<?php
namespace TweeCdn\View\Helper\Cdn;
use InvalidArgumentException;

class Simple extends AbstractCdn
{
	public function decorate($filename)
	{
		$path = $this->getPublicDir() . $filename;
		if (!file_exists($path)) throw new InvalidArgumentException('File ' . $filename . ' not found');
		return $filename . '?' . filemtime($path);
	}
}