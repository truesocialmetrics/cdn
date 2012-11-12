<?php
namespace TweeTest\View\Helper;
use PHPUnit_Framework_TestCase,
	Twee\View\Helper\Cdn\AbstractCdn as CdnAbstractCdn;

include_once __DIR__ . '/_files/AbstractCdnImplementation.php';

class AbstractCdnTest extends PHPUnit_Framework_TestCase
{
	public function testHostnames()
	{
		$helper = new AbstractCdnTest\AbstractCdnImplementation(array());
		$helper->setHostnames(array('http://cdn-0.com', 'http://cdn-1.com'));
		$this->assertEquals(array('http://cdn-0.com', 'http://cdn-1.com'), $helper->getHostnames());
	}

	public function testDecorate()
	{
		$helper = new AbstractCdnTest\AbstractCdnImplementation(array());
		$helper->setHostnames(array('http://cdn-0.com', 'http://cdn-1.com'));
		$this->assertEquals('http://cdn-0.com/a.css', $helper->decorate('/a.css'));
		$this->assertEquals('http://cdn-1.com/y.css', $helper->decorate('/y.css'));
	}

	public function testDecorateZeroHosts()
	{
		$helper = new AbstractCdnTest\AbstractCdnImplementation(array());
		$helper->setHostnames(array());
		$this->assertEquals('/a.css', $helper->decorate('/a.css'));

	}
}