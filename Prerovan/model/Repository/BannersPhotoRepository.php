<?php

namespace Prerovan\Model\Repository;


class BannersPhotoRepository extends BaseRepository
{

    public function getTimeChangePhoto()
    {
        $fluent = $this->createFluent()->where('[folder] = ?', "images_for_time_change_banner");
        $fluent = $fluent->fetchAll();
        return $this->createEntities($fluent);
    }

    public function getAssideBannerPhoto(){
        $fluent = $this->createFluent()
            ->where('[folder] = ?', "images_for_asside_banner")
            ->orderBy('priority asc');
        $fluent = $fluent->fetchAll();
        return $this->createEntities($fluent);
    }

    public function getRefreshBannerPhoto(){
        $fluent = $this->createFluent()
            ->where('[folder] = ?', "images_for_refresh_banner")
            ->orderBy('priority asc');
        $fluent = $fluent->fetchAll();
        return $this->createEntities($fluent);
    }

}