<?php
namespace Twee\View\Helper\Cdn;
use Zend\Stdlib\AbstractOptions;

abstract class AbstractCdn extends AbstractOptions
{
	private $hostname = '';

	public function setHostname($hostname)
	{
		$this->hostname = $hostname;
	}

	public function getHostname()
	{
		return $this->hostname;
	}

	public function decorate($filename)
	{
		return $this->getHostName() . $filename;
	}

	abstract public function __invoke($filename);
}