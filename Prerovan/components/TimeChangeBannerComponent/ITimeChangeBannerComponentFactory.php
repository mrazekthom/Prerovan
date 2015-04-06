<?php

namespace Prerovan\Components;

interface ITimeChangeBannerComponentFactory{

    /**
     * @param $time
     * @return TimeChangeBannerComponent
     */
    public function create($time);

}