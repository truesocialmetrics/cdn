<?php
namespace TweeCdnTest\View\Helper\Cdn;
use PHPUnit_Framework_TestCase,
	TweeCdn\View\Helper\Cdn\Hash as CdnHash;

class HashTest extends PHPUnit_Framework_TestCase
{
	public function testHash()
	{
		$helper = new CdnHash();
		$helper->setPublicDir(__DIR__ . '/_files/hash');
		$helper->setHashes(array('/css/x.css' => 'abc'));
		$this->assertEquals('/css/abc/x.css', $helper('/css/x.css'));
	}

	public function testNonDefined()
	{
		$helper = new CdnHash();
		$helper->setPublicDir(__DIR__ . '/_files/hash');
		$this->assertEquals('/css/e1a699daa0453ed05caa19b84baf9acf/x.css', $helper('/css/x.css'));
	}
}