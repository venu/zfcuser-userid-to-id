<?php

namespace ZfcUserUserIdToId\Mapper;

use ZfcUser\Mapper\UserHydrator as ZfcUserUserHydrator;
use ZfcUser\Entity\UserInterface as UserEntityInterface;

class UserHydrator extends ZfcUserUserHydrator
{
    public function extract($object)
    {
        if (!$object instanceof UserEntityInterface) {
            throw new \ZfcUser\Mapper\Exception\InvalidArgumentException('$object must be an instance of ZfcUser\Entity\UserInterface');
        }
        $data = parent::extract($object);
        
        return $data;
    }

    public function hydrate(array $data, $object)
    {
        if (!$object instanceof UserEntityInterface) {
            throw new \ZfcUser\Mapper\Exception\InvalidArgumentException('$object must be an instance of ZfcUser\Entity\UserInterface');
        }
        
        return parent::hydrate($data, $object);
    }
    
    protected function mapField($keyFrom, $keyTo, array $array)
    {
        if (isset($array[$keyFrom])) {
            $array[$keyTo] = $array[$keyFrom];
            unset($array[$keyFrom]);
        }
        return $array;
    }
}