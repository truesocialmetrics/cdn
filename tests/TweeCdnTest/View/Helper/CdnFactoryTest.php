<?php
namespace TrueTest\View\Helper;
use TweeCdn\View\Helper\CdnFactory as Factory,
	PHPUnit_Framework_TestCase;

class CdnFactoryTest extends PHPUnit_Framework_TestCase
{
	public function testSimple()
	{
		$helper = Factory::factory('simple', array(
			'public_dir' => __DIR__ . '/_files/simple/',
		));
		$this->assertInstanceOf('TweeCdn\View\Helper\Cdn\Simple', $helper);
	}

	public function testRelease()
	{
		$helper = Factory::factory('simple', array(
			'public_dir' => __DIR__ . '/_files/simple/',
		));
		$this->assertInstanceOf('TweeCdn\View\Helper\Cdn\Simple', $helper);
	}

	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testLoadUnknown()
	{
		$helper = Factory::factory('non-exists', array());
	}
}