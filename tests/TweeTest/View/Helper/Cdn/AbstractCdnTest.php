<?php
namespace TweeTest\View\Helper;
use PHPUnit_Framework_TestCase,
	Twee\View\Helper\Cdn\AbstractCdn as CdnAbstractCdn;

include_once __DIR__ . '/_files/AbstractCdnImplementation.php';

class AbstractCdnTest extends PHPUnit_Framework_TestCase
{
	public function testHostname()
	{
		$helper = new AbstractCdnTest\AbstractCdnImplementation(array());
		$helper->setHostName('http://cdn.com');
		$this->assertEquals('http://cdn.com', $helper->getHostName());
	}

	public function testDecorate()
	{
		$helper = new AbstractCdnTest\AbstractCdnImplementation(array());
		$helper->setHostName('http://cdn.com');
		$this->assertEquals('http://cdn.com/x.css', $helper->decorate('/x.css'));
	}
}