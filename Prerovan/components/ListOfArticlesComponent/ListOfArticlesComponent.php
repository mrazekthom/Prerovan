<?php

namespace Prerovan\Components;

use Prerovan\Model\Repository\ArticleRepository;

class ListOfArticlesComponent extends BaseComponent
{

    /** @var ArticleRepository */
    private $AR;

    /** @var int $count */
    private $count;

    public function __construct($count, ArticleRepository $AR)
    {
        $this->AR = $AR;
        $this->count = $count;
    }

    public function render()
    {
        $this->template->articles = $this->AR->getArticles();
        $this->template->render();
    }

}