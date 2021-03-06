<?php

namespace Prerovan\Model\Factory;

use Kdyby\Curl;
use Nette\Object;
use Nette\Utils\Strings;

class RssFactory extends Object
{
    /** url for rssFeed */
    const NEWS = "http://www.aktualne.cz/mrss/";
    const SPORT = "http://www.sport.cz/rss2";
    const BOULEVARD = "http://www.super.cz/rss2";
    const STREAM = "";

    /** count of news, where is rendering */
    private $count;

    /**
     * Get rssFeed and count of this
     *
     * @param $rssFeed
     * @param $count
     */
    public function generate($rssFeed, $count)
    {
        $url = $rssFeed;
        $request = new Curl\Request($url);
        try {
            $response = $request->get();
            $header = $response->getHeaders();
            $response = $response->getResponse();
        } catch (Curl\CurlException $e) {
            // throw $e;
        }

        $this->count = $count;
        $xml = new \SimpleXMLElement($response);

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

    /**
     * Formate rss NewsFeed
     *
     * @param $xml
     * @return mixed
     */
    private function generateNewsFeed($xml)
    {
        $namespace = $xml->getNamespaces(true);
        for ($i = 0; $i <= $this->count - 1; $i++) {
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

    /**
     * Formate rss SportFeed
     *
     * @param $xml
     * @return mixed
     */
    private function generateSportFeed($xml)
    {
        $namespace = $xml->getNamespaces(true);
        for ($i = 0; $i <= $this->count - 1; $i++) {
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

    /**
     * Formate rss BoulevardFeed
     *
     * @param $xml
     * @return mixed
     */
    private function generateBoulevardFeed($xml)
    {
        $namespace = $xml->getNamespaces(true);
        for ($i = 0; $i <= $this->count - 1; $i++) {
            $description = Strings::replace((string)$xml->channel->item[$i]->description, "#<a[^>]*>#");
            $description = Strings::replace($description, "#<\/a[^>]*>#");
            $rssFeed[] = [
                'title' => (string)$xml->channel->item[$i]->title,
                'url' => (string)$xml->channel->item[$i]->link,
                'description' => $description,
                'image' => (string)$xml->channel->item[$i]->children($namespace['szn'])->image // TODO: if image == NULL
            ];
        }
        $rssBoulevardFeed['rssFeed'] = $rssFeed;
        $rssBoulevardFeed['name'] = 'Super';
        return $rssBoulevardFeed;
    }

    /**
     * Formate rss VideoFeed
     *
     * @param $xml
     */
    private function generateVideoFeed($xml)
    {

    }

}
