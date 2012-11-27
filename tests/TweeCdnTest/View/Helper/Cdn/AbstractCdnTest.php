<?php
namespace TweeCdnTest\View\Helper;
use PHPUnit_Framework_TestCase,
	Zend\View\Renderer\PhpRenderer as RendererPhpRenderer,
	TweeCdn\View\Helper\Cdn\AbstractCdn as CdnAbstractCdn;

include_once __DIR__ . '/_files/AbstractCdnImplementation.php';

class AbstractCdnTest extends PHPUnit_Framework_TestCase
{
	public function testView()
	{
		$helper = new AbstractCdnTest\AbstractCdnImplementation(array());
		$view = new RendererPhpRenderer();
		$helper->setView($view);
		$this->assertEquals($view, $helper->getView());
	}

	public function testHostnames()
	{
		$helper = new AbstractCdnTest\AbstractCdnImplementation(array());
		$helper->setHostnames(array('http://cdn-0.com', 'http://cdn-1.com'));
		$this->assertEquals(array('http://cdn-0.com', 'http://cdn-1.com'), $helper->getHostnames());
	}

	public function testHostnamesWithKeyname()
	{
		$helper = new AbstractCdnTest\AbstractCdnImplementation(array());
		$helper->setHostnames(array('h0' => 'http://cdn-0.com', 'h1' => 'http://cdn-1.com'));
		$this->assertEquals(array('http://cdn-0.com', 'http://cdn-1.com'), $helper->getHostnames());
	}

	public function testPublicDir()
	{
		$helper = new AbstractCdnTest\AbstractCdnImplementation(array());
		$helper->setPublicDir(__DIR__);
		$this->assertEquals(__DIR__, $helper->getPublicDir());
	}

	public function testMappings()
	{
		$helper = new AbstractCdnTest\AbstractCdnImplementation(array());
		$helper->setMappings(array(
			'/a.css' => 'http://x.com/a.css',
		));
		$this->assertEquals(array(
			'/a.css' => 'http://x.com/a.css',
		), $helper->getMappings());
	}

	public function testInvoke()
	{
		$helper = new AbstractCdnTest\AbstractCdnImplementation(array());
		$helper->setHostnames(array('http://cdn-0.com', 'http://cdn-1.com'));
		$helper->setMappings(array('/x.css' => 'http://goo.gl/x-1.2.css'));
		$this->assertEquals('http://cdn-0.com/a.css', $helper->__invoke('/a.css'));
		$this->assertEquals('http://cdn-1.com/y.css', $helper->__invoke('/y.css'));
		$this->assertEquals('http://goo.gl/x-1.2.css', $helper->__invoke('/x.css'));
	}

	public function testInvokeZeroHosts()
	{
		$helper = new AbstractCdnTest\AbstractCdnImplementation(array());
		$helper->setHostnames(array());
		$this->assertEquals('/a.css', $helper->__invoke('/a.css'));
	}
}