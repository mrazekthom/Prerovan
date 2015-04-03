<?php

namespace Prerovan\Model\Repository;

class AktualityRepository extends BaseRepository
{
    public function migrate()
    {
        $fluent = $this->createFluent();
        $fluent = $fluent->fetchAll();
        return $this->createEntities($fluent);

    }
}