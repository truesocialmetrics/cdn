<?php
namespace Twee\View\Helper\Cdn;
use InvalidArgumentException;

class Simple
{
	const PUBLIC_DIR = 'public_dir';

	protected $publicDir = '';

	public function __construct(array $options)
	{
		$this->setPublicDir($options[self::PUBLIC_DIR]);
	}

	public function setPublicDir($dir)
	{
		$this->publicDir = $dir;
	}

	public function getPublicDir()
	{
		return $this->publicDir;
	}

	public function __invoke($filename)
	{
		$path = $this->getPublicDir() . $filename;
		if (!file_exists($path)) throw new InvalidArgumentException('File ' . $filename . ' not found');
		return $filename . '?' . filemtime($path);
	}
}