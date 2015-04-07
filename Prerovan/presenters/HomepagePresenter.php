<?php

namespace Prerovan\Presenters;

use Kdyby\Curl;
use Nette;
use Prerovan\Components\IListOfArticlesComponentFactory;
use Prerovan\Components\IListOfRssFeedComponentFactory;
use Prerovan\Components\ISurveyComponentFactory;
use Prerovan\Components\ITimeChangeBannerComponentFactory;
use Prerovan\Model;
use Prerovan\Model\Manager\MigrateManager;

/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter
{

    /** @var  MigrateManager @inject */
    public $MM;

    /** @var  IListOfArticlesComponentFactory @inject */
    public $LOACF;

    /** @var  IListOfRssFeedComponentFactory @inject */
    public $LORSCF;

    /** @var ISurveyComponentFactory @inject */
    public $SCF;

    public function renderDefault()
    {
        #$this->MM->migrate();
    }

    public function createComponentListOfArticles()
    {
        return $this->LOACF->create(6);
    }

    public function createComponentListOfRssFeedSport()
    {
        return $this->LORSCF->create(Model\Factory\RssFactory::SPORT, 3);
    }

    public function createComponentListOfRssFeedNews()
    {
        return $this->LORSCF->create(Model\Factory\RssFactory::NEWS, 3);
    }

    public function createComponentListOfRssFeedBoulevard()
    {
        return $this->LORSCF->create(Model\Factory\RssFactory::BOULEVARD, 3);
    }

    public function createComponentSurveyComponent() {
        return $this->SCF->create();
    }
}
