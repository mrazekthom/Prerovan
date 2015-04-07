<?php

namespace Prerovan\Model\Manager;

use Nette\Object;
use Prerovan\Model\Factory\CurrencyFactory;

class CurrencyManager extends Object
{

    /** @var CurrencyFactory */
    private $CF;

    public function __construct(CurrencyFactory $CF)
    {
        $this->CF = $CF;
    }

    public function getDailyCurrency()
    {
        $dailyCurrency = $this->CF->dailyCurrency();
        return $dailyCurrency;
    }

}