<?php

namespace Prerovan\Model\Factory;

use Kdyby\Curl;
use Nette\Object;

class RssFactory extends Object
{

    const NEWS = "http://www.aktualne.cz/mrss/";
    const SPORT = "http://www.sport.cz/rss2";
    const BOULEVARD = "http://www.super.cz/rss2";
    const STREAM = "";

    public function generate($rssFeed)
    {

        $url = $rssFeed;
        $rssNewsFeed = [];
        $request = new Curl\Request($url);
        try {
            $response = $request->get();
            $header = $response->getHeaders();
            $response = $response->getResponse();
        } catch (Curl\CurlException $e) {
            throw $e;

        }
        $xml =  new \SimpleXMLElement($response);

        if ($rssFeed == static::NEWS) {
            return $this->generateNewsFeed($xml);
        } elseif ($rssFeed == static::SPORT) {
            return $this->generateSportFeed($xml);
        } elseif ($rssFeed == static::BOULEVARD) {
            return $this->generateBoulevardFeed($xml);
        } elseif ($rssFeed == static::STREAM) {
            return $this->generateVideoFeed($xml);
        }
    }

    private function generateNewsFeed($xml)
    {
        $namespace = $xml->getNamespaces(true);
        for ($i = 0; $i <= 2; $i++) {
            $rssFeed[] = [
                'title' => (string)$xml->channel->item[$i]->title,
                'url' => (string)$xml->channel->item[$i]->link,
                'description' => (string)$xml->channel->item[$i]->description,
                'image' => (string)$xml->channel->item[0]->children($namespace['media'])->group->children($namespace['media'])->content->attributes()->url
            ];
        }
        $rssNewFeed['rssFeed'] = $rssFeed;
        $rssNewFeed['name'] = 'Aktuálně';
        return $rssNewFeed;
    }

    private function generateSportFeed($xml)
    {
        $namespace = $xml->getNamespaces(true);
        for ($i = 0; $i <= 2; $i++) {
            $rssFeed[] = [
                'title' => (string)$xml->channel->item[$i]->title,
                'url' => (string)$xml->channel->item[$i]->link,
                'description' => (string)$xml->channel->item[$i]->description,
                'image' => (string)$xml->channel->item[$i]->children($namespace['szn'])->image
            ];
        }
        $rssSportFeed['rssFeed'] = $rssFeed;
        $rssSportFeed['name'] = 'Sport';
        return $rssSportFeed;
    }


    private function generateBoulevardFeed($xml)
    {
        $namespace = $xml->getNamespaces(true);
        for ($i = 0; $i <= 2; $i++) {
            $rssFeed[] = [
                'title' => (string)$xml->channel->item[$i]->title,
                'url' => (string)$xml->channel->item[$i]->link,
                'description' => (string)$xml->channel->item[$i]->description,
                'image' => (string)$xml->channel->item[$i]->children($namespace['szn'])->image
            ];
        }
        $rssBoulevardFeed['rssFeed'] = $rssFeed;
        $rssBoulevardFeed['name'] = 'Super';
        return $rssBoulevardFeed;
    }

    private function generateVideoFeed($xml)
    {

    }

}
