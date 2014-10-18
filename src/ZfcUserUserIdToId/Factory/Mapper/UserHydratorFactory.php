<?php

namespace ZfcUserUserIdToId\Factory\Mapper;

use Zend\Crypt\Password\Bcrypt;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZfcUserUserIdToId\Mapper;

class UserHydratorFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $options = $serviceLocator->get('zfcuser_module_options');
        $crypto  = new Bcrypt;
        $crypto->setCost($options->getPasswordCost());
        return new Mapper\UserHydrator($crypto);
    }
}