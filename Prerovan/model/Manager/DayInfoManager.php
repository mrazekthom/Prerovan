<?php

namespace Prerovan\Model\Manager;

use Nette\Object;
use Prerovan\Model\Factory\DayInfoFactory;

class DayInfoManager extends Object
{

    /** @var DayInfoFactory */
    private $DIF;

    public function __construct(DayInfoFactory $DIF)
    {
        $this->DIF = $DIF;
    }

    /**
     * Decode day from number
     *
     * @return string
     */
    public function getActualDay()
    {
        $days = [
            'Neděle',
            'Pondělí',
            'Úterý',
            'Středa',
            'Čtvrtek',
            'Pátek',
            'Sobota'
        ];
        $months = [
            '. prosinece',
            '. ledna',
            '. února',
            '. března',
            '. dubna',
            '. května',
            '. června',
            '. července',
            '. srpna',
            '. září',
            '. října',
            '. listopadu'
        ];
        $day = $days[date('w')];
        $numberOfDay = date('d');
        $month = $months[date('n')];

        return $day . ', ' . $numberOfDay . $month;
    }

    /**
     * Get actual weather
     *
     * @return array
     */
    public function getActualWeather()
    {
        return $this->DIF->actualWeather();
    }

}