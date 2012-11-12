<?php
namespace Twee\View\Helper\Cdn;
use Zend\Stdlib\AbstractOptions;

abstract class AbstractCdn extends AbstractOptions
{
	private $hostnames = array();

	private $publicDir = '';

	public function setHostnames(array $hostnames)
	{
		$this->hostnames = $hostnames;
	}

	public function getHostnames()
	{
		return $this->hostnames;
	}

	public function setPublicDir($dir)
	{
		$this->publicDir = $dir;
	}

	public function getPublicDir()
	{
		return $this->publicDir;
	}

	public function decorate($filename)
	{
		$hostnames = $this->getHostnames();
		if (empty($hostnames)) return $filename;

		return $hostnames[crc32($filename) % count($hostnames)] . $filename;
	}

	abstract public function __invoke($filename);
}