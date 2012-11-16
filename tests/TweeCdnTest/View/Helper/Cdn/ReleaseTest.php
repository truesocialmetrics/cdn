<?php
namespace TrueTest\View\Helper;
use PHPUnit_Framework_TestCase,
	TweeCdn\View\Helper\Cdn\Release as CdnRelease;

class ReleaseTest extends PHPUnit_Framework_TestCase
{
	public function testRelease()
	{
		$helper = new CdnRelease(array(
			'release' => '20121112064617',
		));
		$this->assertEquals('/css/20121112064617/x.css', $helper('/css/x.css'));
	}

	public function testReleaseMainPath()
	{
		$helper = new CdnRelease(array(
			'release' => '20121112064617',
		));
		$this->assertEquals('/favicon.ico', $helper('/favicon.ico'));
	}

	public function testReleaseRelatinalPath()
	{
		$helper = new CdnRelease(array(
			'release' => '20121112064617',
		));
		$this->assertEquals('x.css', $helper('x.css'));
	}

	public function testReleaseHost()
	{
		$helper = new CdnRelease(array(
			'hostnames' => array('http://cdn.com'),
			'release'   => '20121112064617',
		));
		$this->assertEquals('http://cdn.com/css/20121112064617/x.css', $helper('/css/x.css'));
	}
}