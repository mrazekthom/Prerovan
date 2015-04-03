<?php

namespace Prerovan\Components;

use Prerovan\Model\Repository\ArticlesRepository;

class ListOfArticlesComponent extends BaseComponent
{

    /** @var ArticlesRepository */
    private $AR;

    /** @var int $count */
    private $count;

    public function __construct($count, ArticlesRepository $AR)
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