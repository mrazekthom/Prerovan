<?php

namespace Prerovan\Model\Factory;

use Kdyby\Curl;
use Nette\Object;
use Nette\Utils\Strings;

class CurrencyFactory extends Object
{
    /** url for currency */
    const CURRENCY = "http://www.cnb.cz/cs/financni_trhy/devizovy_trh/kurzy_devizoveho_trhu/denni_kurz.txt?date=";

    /**
     * Get daily currency with date shift
     *
     * @param $shift
     * @return array
     */
    public function dailyCurrency($shift)
    {
        $wantedCurrency = ['USD', 'EUR', 'GBP', 'RUB', 'PLN', 'HRK'];

        $day = date('d') - $shift;
        $url = $this::CURRENCY . $day . date('.m.Y');
        $request = new Curl\Request($url);
        try {
            $response = $request->get();
            $header = $response->getHeaders();
            $response = $response->getResponse();
        } catch (Curl\CurlException $e) {
            throw $e;
        }
        $arrayOfCurrency = Strings::split($response, '~["\v"]~');
        $CZKValue = [];
        foreach ($arrayOfCurrency as $currency) {
            $foo = Strings::split($currency, '~["|"]~');
            if (isset($foo[3]) && in_array($foo[3], $wantedCurrency)) {
                $CZKValue[$foo[3]] = $foo[4];
            }
        }

        $result = [];
        foreach ($CZKValue as $name => $value) {
            $result[] = [
                'name' => $name,
                'img' => Strings::lower($name . '.gif'),
                'slug' => Strings::lower($name),
                'value' => $value
            ];
        }

        return ($result);
    }

}