<?php

namespace Prerovan\Components;

interface IDayInfoComponentFactory{

    /**
     * @return DayInfoComponent
     */
    public function create();

}