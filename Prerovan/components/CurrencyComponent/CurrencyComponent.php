<?php

namespace Prerovan\Components;

use Prerovan\Model\Manager\CurrencyManager;

class CurrencyComponent extends BaseComponent
{

    /** @var  CurrencyManager */
    public $CM;

    public function __construct(CurrencyManager $CM){
        $this->CM = $CM;
    }

    public function render()
    {
        $this->template->currencies = $this->CM->getDailyCurrency();
        $this->template->render();
    }

}