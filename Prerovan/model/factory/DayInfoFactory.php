<?php

namespace Prerovan\Model\Factory;

use Kdyby\Curl;
use Nette\Object;
use Nette\Utils\Strings;
use Nette\Utils\DateTime;

class DayInfoFactory extends Object
{

    const WEATHER = "http://www.in-pocasi.cz/pocasi-na-web/xml-ukazky/mesto.xml";

    public function actualWeather()
    {
        $url = $this::WEATHER;
        $request = new Curl\Request($url);
        try {
            $response = $request->get();
            $header = $response->getHeaders();
            $response = $response->getResponse();
        } catch (Curl\CurlException $e) {
            throw $e;
        }
        $xml =  new \SimpleXMLElement($response);

        $actual = [
            'status' => $this->getCorrectName((string)$xml->mesto->actual['stav']),
            'temperature' => (string)$xml->mesto->actual['teplota'],
            'image' => (string)$xml->mesto->actual['stav'] . ".png"
        ];

        return $actual;
    }

    private function getCorrectName($status){
        $correctName = [
            'zatazeno' => 'Zataženo',
            'skorojasno' => 'Skoro jasno',
            'polojasno' => 'Polojasno',
            'dest' => 'Oblačno až zataženo s trvalým deštěm',
            'prehanky-bourky' => 'Polojasno až oblačno s přeháňkami nebo bouřkami',
            'prehanky-snih-dest' => 'Polojasno až oblačno se smíšenými přeháňkami',
            'snih' => 'Oblačno až zataženo se sněžením',
            'obcasny-dest' => 'Oblačno až zataženo s občasným deštěm',
            'oblacno' => 'Oblačno',
            'bourky' => 'Oblačno až zataženo s bouřkami',
            'jasno' => 'Jasno',
            'prehanky-snih' => 'Polojasno až oblačno se sněhovými přeháňkami',
            'mlha' => 'Mlha, zataženo nízkou oblačností',
            'snih-dest' => 'Oblačno až zataženo s deštěm se sněhem',
            'prehanky-dest' => 'Polojasno až oblačno s dešťovými přeháňkami',
            'skorojasno-bourky' => 'Skoro jasno až polojasno s možností bouřky',
            'skorojasno-prehanky' => 'Skoro jasno až polojasno s možností přeháňky',
            'kroupy' => 'Polojasno až oblačno s bouřkami doprovázené kroupami'
        ];

        return $correctName[$status];
    }

}