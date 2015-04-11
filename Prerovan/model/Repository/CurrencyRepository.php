<?php

namespace Prerovan\Model\Repository;


class CurrencyRepository extends BaseRepository
{

    public function getLastCurrency()
    {
        $fluent = $this->createFluent();
        $fluent = $fluent->fetchAll();
        return $this->createEntities($fluent);
    }

}