<?php
namespace TweeCdn\ServiceManager\View\Helper\Factory;

use TweeCdn\View\Helper\Cdn\Factory as Factory;
use Zend\ServiceManager\AbstractPluginManager;
use Interop\Container\ContainerInterface;

class CdnFactory
{
    public function __invoke(ContainerInterface $serviceLocator)
    {
        $config = $this->$serviceLocator->get('config')['di']['instance']['TweeCdn\View\Helper\Cdn'];

        return Factory::factory($config['parameters']['type'], $config['parameters']['options']);
    }
}