<?php

namespace Prerovan\Components;

use Kdyby\Curl;

class ListOfRssFeedComponent extends BaseComponent
{

    /** @var string $rssChannel */
    private $rssChannel;

    public function __construct($rssChannel)
    {
        $this->rssChannel = $rssChannel;
    }

    public function render()
    {
        $rssFeed = [];
        $url = "http://www.aktualne.cz/mrss/"; # $rssChannel -> db -> url
        $test = new Curl\Request($url);
        try {
            $response = $test->get();
            $header = $response->getHeaders();
            $response = $response->getResponse();
        } catch (Curl\CurlException $e) {
            dump($e->getMessage());
        }
        $xml = simplexml_load_string($response) or die("Error: Cannot create object");
        foreach ($xml->channel->item as $item) {
            $rssFeed[] = [
                'title' => $item->title,
                'slug' => $item->link
            ];
        }
        $this->template->rssFeed = $rssFeed;
        $this->template->render();
    }

}