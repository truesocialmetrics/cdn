<?php
namespace TweeCdnTest\Hash;
use PHPUnit\Framework\TestCase,
	TweeCdn\Hash\Collector as HashCollector;

class CollectorTest extends TestCase
{
	public function testConstaruct()
	{
		$collector = new HashCollector(__DIR__ . '/');
		$this->assertAttributeEquals(
        	__DIR__,
        	'path',
        	$collector
        );
	}

	public function testCollect()
	{
		$collector = new HashCollector(__DIR__ . '/_files/');
		$this->assertEquals(array('/css/x.css' => '92f7ecc776c7c9788509f72da453ea03'), $collector->collect());
	}
}
