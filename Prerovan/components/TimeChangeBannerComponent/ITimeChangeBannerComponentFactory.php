<?php

namespace Prerovan\Components;

use Prerovan\Model\Entity\BannersPhoto;

interface ITimeChangeBannerComponentFactory {

    /**
     * @param BannersPhoto[] $banners
     * @param $delay
     * @return TimeChangeBannerComponent
     */
    public function create(array $banners, $delay);

}