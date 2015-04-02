<?php

namespace Prerovan\Components;

use Kdyby\Curl;
use Prerovan\Model\Manager\RssManager;

class ListOfRssFeedComponent extends BaseComponent
{

    /** @var string $rssCategory */
    private $rssCategory;

    /** @var  RssManager */
    private $RM;

    public function __construct($rssCategory, RssManager $RM)
    {
        $this->rssCategory = $rssCategory;
        $this->RM = $RM;
    }

    public function render()
    {
        $rssFeed = $this->RM->getRss($this->rssCategory);
        $this->template->rssFeed = $rssFeed['rssFeed'];
        $this->template->name = $rssFeed['name'];
        $this->template->render();
    }

}