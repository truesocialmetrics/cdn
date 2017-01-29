<?php
namespace TweeCdn\View\Helper\Factory;

use TweeCdn\Factory as CdnFactory;
use Zend\ServiceManager\AbstractPluginManager;
use Zend\ServiceManager\ServiceLocatorInterface;

class CdnFactory
{
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $config = $this->$serviceLocator->get('config')['di']['instance']['TweeCdn\View\Helper\Cdn'];

        return CdnFactory::factory($config['parameters']['type'], $config['parameters']['options']);
    }
}