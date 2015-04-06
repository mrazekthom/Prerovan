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

}