<?php

namespace Prerovan\Model\Repository;


class RefreshBannerRepository extends BaseRepository
{

    public function getLastShowBanner()
    {
        $fluent = $this->createFluent()->orderBy('id desc');
        $row = $fluent->fetch();
        return $this->createEntity($row);
    }

}