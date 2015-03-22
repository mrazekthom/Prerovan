<?php

namespace Prerovan\Model\Manager;


use Nette\Object;
use Kdyby\Curl;
use Prerovan\Model\Repository\RssfeedRepository;

class RssManager extends Object
{

    /** @var  RssfeedRepository */
    private $RR;

    public function __construct(RssfeedRepository $RR){
        $this->RR = $RR;
    }

    private function rssSlugByCategory($RssCategory)
    {
        $rssSlug = $this->RR->getRssSlug($RssCategory);
        return $rssSlug;
    }

    public function getRss($RssCategory)
    {
        $url = $this->rssSlugByCategory($RssCategory);
        $rssFeed = [];
        $request = new Curl\Request($url);
        try {
            $response = $request->get();
            $header = $response->getHeaders();
            $response = $response->getResponse();
        } catch (Curl\CurlException $e) {
            dump($e->getMessage());
        }
        $xml = simplexml_load_string($response) or die("Error: Cannot create object");
        for ($i = 0; $i <= 5; $i++){
            $rssFeed[] = [
                'title' => $xml->channel->item[$i]->title,
                'slug' => $xml->channel->item[$i]->link
            ];
        }
        return $rssFeed;
    }

}