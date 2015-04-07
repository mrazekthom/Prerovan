<?php

namespace Prerovan\Components;

interface ICurrencyComponentFactory{

    /**
     * @return CurrencyComponent
     */
    public function create();

}