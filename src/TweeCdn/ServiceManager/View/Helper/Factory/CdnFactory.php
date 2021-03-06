<?php
namespace TweeCdn\ServiceManager\View\Helper\Factory;

use TweeCdn\View\Helper\Cdn\Factory as Factory;
use Laminas\ServiceManager\AbstractPluginManager;
use Interop\Container\ContainerInterface;

class CdnFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->get('config')['di']['instance']['TweeCdn\View\Helper\Cdn'];

        return Factory::factory($config['parameters']['type'], $config['parameters']['options']);
    }
}
