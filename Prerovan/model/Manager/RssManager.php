<?php

namespace Prerovan\Model\Manager;

use Nette\Object;
use Prerovan\Model\Factory\RssFactory;

class RssManager extends Object
{

    /** @var RssFactory */
    private $RF;

    public function __construct(RssFactory $RF)
    {
        $this->RF = $RF;
    }

    public function getRss($RssCategory)
    {
        $rssFeed = $this->RF->generate($RssCategory);
        return $rssFeed;
    }

}