<?php

namespace Prerovan\Components;


class DayInfoComponent extends BaseComponent
{

    public function __construct(){

    }

    public function render()
    {
        $this->template->day = $this->getActualDay();
        $this->template->render();
    }

    private function getActualDay(){
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

}