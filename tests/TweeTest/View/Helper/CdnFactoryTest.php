<?php
namespace TrueTest\View\Helper;
use Twee\View\Helper\CdnFactory as Factory,
	PHPUnit_Framework_TestCase;

class CdnFactoryTest extends PHPUnit_Framework_TestCase
{
	public function testSimple()
	{
		$helper = Factory::factory('simple', array(
			'htdocs' => __DIR__ . '/_files/simple/',
		));
		$this->assertInstanceOf('Twee\View\Helper\Cdn\Simple', $helper);
	}

	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testLoadUnknown()
	{
		$helper = Factory::factory('non-exists', array());
	}
}