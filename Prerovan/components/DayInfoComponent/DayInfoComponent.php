<?php

namespace Prerovan\Components;

use Prerovan\Model\Manager\DayInfoManager;

class DayInfoComponent extends BaseComponent
{

    /** @var  DayInfoManager */
    private  $DIM;

    public function __construct(DayInfoManager $DIM){
        $this->DIM = $DIM;
    }

    public function render()
    {
        $this->template->weather = $this->DIM->getActualWeather();
        $this->template->day = $this->DIM->getActualDay();
        $this->template->render();
    }

}