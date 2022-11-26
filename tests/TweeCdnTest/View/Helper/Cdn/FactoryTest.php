<?php
namespace TweeCdn\View\Helper\Cdn;

use PHPUnit\Framework\TestCase;

class FactoryTest extends TestCase
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

    public function testHash()
    {
        $helper = Factory::factory('hash', array(
            'public_dir' => __DIR__ . '/_files/simple/',
            'hashes' => array(),
        ));
        $this->assertInstanceOf('TweeCdn\View\Helper\Cdn\Hash', $helper);
    }

    public function testHashFile()
    {
        $helper = Factory::factory('hash_file', array(
            'public_dir' => __DIR__ . '/_files/simple/',
            'filename' => __DIR__ . '/_files/hashes.php',
        ));
        $this->assertInstanceOf('TweeCdn\View\Helper\Cdn\HashFile', $helper);
    }


    public function testLoadUnknown()
    {
        $this->expectException(\InvalidArgumentException::class);
        $helper = Factory::factory('non-exists', array());
    }
}
