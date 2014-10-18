<?php

namespace ZfcUserUserIdToId;

use ZfcUser\Mapper\User;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'zfcuser_user_hydrator' => 'ZfcUserUserIdToId\Factory\Mapper\UserHydratorFactory',
                
                'zfcuser_user_mapper' => function ($sm) {
                    $options = $sm->get('zfcuser_module_options');
                    
                    $mapper = new User();
                    $mapper->setDbAdapter($sm->get('Zend\Db\Adapter\Adapter'));
                    $mapper->setEntityPrototype(new Entity\User());
                    $mapper->setHydrator($sm->get('zfcuser_user_hydrator'));
                    $mapper->setTableName($options->getTableName());
                    
                    return $mapper;
                },
            ),
        );
    }


}
