<?php

namespace Prerovan\Presenters;

use Nette,
	Prerovan\Model;
use Prerovan\Model\Repository\ArticleRepository;

/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter
{
    /** @var ArticleRepository @inject */
    public $AR;

	public function renderDefault()
	{
        dump($this->context->parameters);
		$this->template->anyVariable = 'any value';
        $this->template->foo = $this->AR->getNews();
	}

}
