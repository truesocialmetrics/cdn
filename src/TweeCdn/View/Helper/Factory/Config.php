<?php
namespace TweeCdn\View\Helper\Factory;

use TweeCdn\View\Helper\CdnFactory as HelperCdnFactory;
use Zend\ServiceManager\AbstractPluginManager;
use Zend\ServiceManager\ServiceLocatorInterface;

class Config
{
    public function getContainer(ServiceLocatorInterface $serviceLocator)
    {
        if ($serviceLocator instanceof AbstractPluginManager) {
            return $serviceLocator->getServiceLocator();
        }

        return $serviceLocator;
    }

    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $config = $this
            ->getContainer($serviceLocator)
            ->get('config')['di']['instance']['TweeCdn\View\Helper\Cdn\AbstractCdn'];

        return HelperCdnFactory::factory($config['parameters']['type'], $config['parameters']['options']);
    }
}