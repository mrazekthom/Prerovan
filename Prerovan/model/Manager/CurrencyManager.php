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

    /**
     * Get Daily (actual) Currency
     *
     * @return array
     */
    public function getDailyCurrency()
    {
        $dailyCurrency = $this->CF->dailyCurrency(1);
        return $dailyCurrency;
    }

    /**
     * Get currency with shift (not actual currency)
     *
     * @param     $today
     * @param int $shift
     * @return array
     */
    public function getYesterdayCurrency($today, $shift = 2)
    {
        $YesterdayCurrency = $this->CF->dailyCurrency($shift);
        if ($YesterdayCurrency == $today) {
            $YesterdayCurrency = $this->getYesterdayCurrency($today, $shift + 1);
        }
        return $YesterdayCurrency;
    }

}