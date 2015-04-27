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
        $this->count = $count;
        $this->AR = $AR;
    }

    public function render()
    {
        $this->template->articles = $this->AR->getArticles($this->count);
        $this->template->render();
    }

}

interface IListOfArticlesComponentFactory
{
    /**
     * @param $count
     * @return ListOfArticlesComponent
     */
    public function create($count);
}