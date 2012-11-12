<?php
namespace TrueTest\View\Helper;
use Twee\View\Helper\CdnFactory as Factory,
	PHPUnit_Framework_TestCase;

class CdnFactoryTest extends PHPUnit_Framework_TestCase
{
	public function testSimple()
	{
		$helper = Factory::factory('simple', array(
			'public_dir' => __DIR__ . '/_files/simple/',
		));
		$this->assertInstanceOf('Twee\View\Helper\Cdn\Simple', $helper);
	}

	public function testRelease()
	{
		$helper = Factory::factory('release', array(
			'release' => '20121112064617',
		));
		$this->assertInstanceOf('Twee\View\Helper\Cdn\Release', $helper);
	}

	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testLoadUnknown()
	{
		$helper = Factory::factory('non-exists', array());
	}
}