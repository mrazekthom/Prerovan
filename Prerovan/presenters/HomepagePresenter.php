<?php

namespace Prerovan\Presenters;

use Nette,
	Prerovan\Model;
use Prerovan\Model\Repository\ArticleRepository;
use Prerovan\Components\IListOfArticlesComponentFactory;

/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter
{
    /** @var ArticleRepository @inject */
    public $AR;

    /** @var  IListOfArticlesComponentFactory @inject */
    public $ACF;

	public function renderDefault()
	{

	}

    public function createComponentListOfArticles(){
        return $this->ACF->create(6);
    }

}
