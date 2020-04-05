<?php
namespace TweeCdn\View\Helper\Cdn;
use InvalidArgumentException;

class Simple extends AbstractCdn
{
	public function decorate(string $filename) : string
	{
		$path = $this->getPublicDir() . $filename;
		if (!file_exists($path)) {
            throw new InvalidArgumentException('File ' . $filename . ' not found');
        }

		return $filename . '?' . filemtime($path);
	}
}
