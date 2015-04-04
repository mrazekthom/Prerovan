<?php

namespace Prerovan\Components;

use Kdyby\Curl;
use Prerovan\Model\Manager\RssManager;

class ListOfRssFeedComponent extends BaseComponent
{

    /** @var string $rssCategory */
    private $rssCategory;

    /** @var string $count */
    private $count;

    /** @var  RssManager */
    private $RM;

    public function __construct($rssCategory, $count, RssManager $RM)
    {
        $this->rssCategory = $rssCategory;
        $this->count = $count;
        $this->RM = $RM;
    }

    public function render()
    {
        $rssFeed = $this->RM->getRss($this->rssCategory, $this->count);
        $this->template->rssFeed = $rssFeed['rssFeed'];
        $this->template->name = $rssFeed['name'];
        $this->template->render();
    }

}