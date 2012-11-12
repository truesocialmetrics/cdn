<?php
namespace Twee\View\Helper\Cdn;

abstract class AbstractCdn
{
	private $hostname = '';

	public function setHostName($hostname)
	{
		$this->hostname = $hostname;
	}

	public function getHostName()
	{
		return $this->hostname;
	}

	public function decorate($filename)
	{
		return $this->getHostName() . $filename;
	}

	abstract public function __invoke($filename);
}