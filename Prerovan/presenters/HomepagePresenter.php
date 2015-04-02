<?php

namespace Prerovan\Presenters;

use Kdyby\Curl;
use Nette;
use Prerovan\Components\IListOfArticlesComponentFactory;
use Prerovan\Components\IListOfRssFeedComponentFactory;
use Prerovan\Model;
use Prerovan\Model\Repository\ArticleRepository;

/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter
{
    /** @var ArticleRepository @inject */
    public $AR;

    /** @var  IListOfArticlesComponentFactory @inject */
    public $LOACF;

    /** @var  IListOfRssFeedComponentFactory @inject */
    public $LORSCF;

    public function renderDefault()
    {

    }

    public function createComponentListOfArticles()
    {
        return $this->LOACF->create(6);
    }

    public function createComponentListOfRssFeedSport()
    {
        return $this->LORSCF->create(Model\Factory\RssFactory::SPORT);
    }

    public function createComponentListOfRssFeedNews()
    {
        return $this->LORSCF->create(Model\Factory\RssFactory::NEWS);
    }

    public function createComponentListOfRssFeedBoulevard()
    {
        return $this->LORSCF->create(Model\Factory\RssFactory::BOULEVARD);
    }

}
