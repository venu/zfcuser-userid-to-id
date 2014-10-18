<?php

namespace ZfcUserUserIdToId\Mapper;

use ZfcUser\Mapper\UserHydrator as ZfcUserUserHydrator;

class UserHydrator extends ZfcUserUserHydrator
{
    public function extract($object)
    {
        $this->guardUserObject($object);
        return parent::extract($object);
    }

    public function hydrate(array $data, $object)
    {
        $this->guardUserObject($object);
        return parent::hydrate($data, $object);
    }
}