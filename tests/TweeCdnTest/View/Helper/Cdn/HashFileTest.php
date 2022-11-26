<?php
namespace TweeCdnTest\View\Helper\Cdn;
use PHPUnit\Framework\TestCase,
	TweeCdn\View\Helper\Cdn\HashFile as CdnHash;

class HashFileTest extends TestCase
{
	public function testHash()
	{
		$helper = new CdnHash();
		$helper->setPublicDir(__DIR__ . '/_files/hash');
		$helper->setFileName(__DIR__ . '/_files/hashes.php');
		$this->assertEquals('/css/abc/x.css', $helper('/css/x.css'));
	}

	public function testNonDefined()
	{
		$helper = new CdnHash();
		$helper->setPublicDir(__DIR__ . '/_files/hash');
		$helper->setFileName(__DIR__ . '/_files/hashes.php');
		$this->assertEquals('/css/e1a699daa0453ed05caa19b84baf9acf/y.css', $helper('/css/y.css'));
	}

	public function testNonDefinedFile()
	{
		$helper = new CdnHash();
		$helper->setPublicDir(__DIR__ . '/_files/hash');
		$this->assertEquals('/css/e1a699daa0453ed05caa19b84baf9acf/x.css', $helper('/css/x.css'));
		$this->assertEquals('/css/e1a699daa0453ed05caa19b84baf9acf/y.css', $helper('/css/y.css'));
	}
}
