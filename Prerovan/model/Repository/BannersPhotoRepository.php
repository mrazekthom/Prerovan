<?php

namespace Prerovan\Model\Repository;


class BannersPhotoRepository extends BaseRepository
{
    /**
     * Get photo for time change banner
     *
     * @return array
     */
    public function getTimeChangePhoto()
    {
        $fluent = $this->createFluent()->where('[folder] = ?', "images_for_time_change_banner");
        $fluent = $fluent->fetchAll();
        return $this->createEntities($fluent);
    }

    /**
     * Get photo for asside banner
     *
     * @return array
     */
    public function getAssideBannerPhoto()
    {
        $fluent = $this->createFluent()
            ->where('[folder] = ?', "images_for_asside_banner")
            ->orderBy('priority asc');
        $fluent = $fluent->fetchAll();
        return $this->createEntities($fluent);
    }

    /**
     * Get photo for refresh banner
     *
     * @return array
     */
    public function getRefreshBannerPhoto()
    {
        $fluent = $this->createFluent()
            ->where('[folder] = ?', "images_for_refresh_banner")
            ->orderBy('priority asc');
        $fluent = $fluent->fetchAll();
        return $this->createEntities($fluent);
    }

}