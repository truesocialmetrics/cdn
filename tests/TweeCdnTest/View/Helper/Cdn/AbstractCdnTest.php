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