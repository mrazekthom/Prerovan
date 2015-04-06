<?php

namespace Prerovan\Components;

interface IRefreshBannerComponentFactory{

    /**
     * @param $time
     * @return RefreshBannerComponent
     */
    public function create();

}