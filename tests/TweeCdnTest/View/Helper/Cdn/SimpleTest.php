<?php
namespace TweeCdnTest\View\Helper\Cdn;
use PHPUnit\Framework\TestCase,
	TweeCdn\View\Helper\Cdn\Simple as CdnSimple;

class SimpleTest extends TestCase
{
	public function testReplace()
	{
		$helper = new CdnSimple(array(
			'public_dir' => __DIR__ . '/_files/simple',
		));
		$filename = '/x.css?' . filemtime(__DIR__ . '/_files/simple/x.css');
		$this->assertEquals($filename, $helper->__invoke('/x.css'));
	}

	public function testInvalid()
	{
		$this->expectException(\InvalidArgumentException::class);
		$helper = new CdnSimple(array(
			'public_dir' => __DIR__ . '/_files/simple',
		));
		$helper->__invoke('/non-exists.css');
	}

	public function testReplaceAndHostname()
	{
		$helper = new CdnSimple(array(
			'hostnames'  => array('http://cdn.com'),
			'public_dir' => __DIR__ . '/_files/simple',
		));
		$filename = 'http://cdn.com/x.css?' . filemtime(__DIR__ . '/_files/simple/x.css');
		$this->assertEquals($filename, $helper->__invoke('/x.css'));
	}
}
