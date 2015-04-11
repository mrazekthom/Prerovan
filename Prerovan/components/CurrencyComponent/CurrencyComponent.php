<?php

namespace Prerovan\Components;

use Nette\Utils\Strings;
use Prerovan\Model\Manager\CurrencyManager;

class CurrencyComponent extends BaseComponent
{

    /** @var  CurrencyManager */
    public $CM;

    public function __construct(CurrencyManager $CM){
        $this->CM = $CM;
    }

    private function compareCurrency(){
        $today = $this->CM->getDailyCurrency();
        $yesterday = $this->CM->getYesterdayCurrency();
        $currencies = [];
        for($i = 0; $i < 6; $i++){
            $currencies[] = [
                'name' => $today[$i]['name'],
                'img' => $today[$i]['img'],
                'slug' => $today[$i]['slug'],
                'value' => $today[$i]['value'],
                'difference' => $this->difference($today[$i]['value'], $yesterday[$i]['value'])
            ];
        }
        return $currencies;
    }

    private function difference($today, $yesterday){
        $today = (float)Strings::replace($today, '#,#', '.');
        $yesterday = (float)Strings::replace($yesterday, '#,#', '.');
        $difference = $today - $yesterday;
        return round(100 * $difference / $today, 2);
    }

    public function render()
    {
        $this->template->currencies = $this->compareCurrency();
        $this->template->render();
    }

}