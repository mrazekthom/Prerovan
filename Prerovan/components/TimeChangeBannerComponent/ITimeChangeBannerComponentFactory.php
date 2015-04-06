<?php

namespace Prerovan\Components;

use Prerovan\Model\Entity\BannersPhoto;

interface ITimeChangeBannerComponentFactory{

    /**
     * @param BannersPhoto[] $timeChangeBanner
     * @param $time
     * @return TimeChangeBannerComponent
     */
    public function create(array $timeChangeBanner, $time);

}