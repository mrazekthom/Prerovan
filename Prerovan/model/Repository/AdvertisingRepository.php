<?php

namespace Prerovan\Model\Repository;


class AdvertisingRepository extends BaseRepository
{

    public function getAdvertising()
    {
        $fluent = $this->createFluent()->orderBy('inserted desc')->where('[confirmed] = 1');
        $fluent = $fluent->fetchAll();
        return $this->createEntities($fluent);
    }

}