<?php

namespace Prerovan\FrontModule\Presenters;

use Prerovan\Components\IAsideBannerComponentFactory;
use Prerovan\Components\ICurrencyComponentFactory;
use Prerovan\Components\IDayInfoComponentFactory;
use Prerovan\Components\IRefreshBannerComponentFactory;
use Prerovan\Components\ISurveyComponentFactory;
use Prerovan\Components\ITimeChangeBannerComponentFactory;
use Prerovan\Model;
use Prerovan\Presenters\BasePresenter;


/**
 * Base presenter for all application presenters.
 */
abstract class BaseFrontPresenter extends BasePresenter
{

    /** @var Model\Repository\BannersPhotoRepository @inject */
    public $BPR;

    /** @var ITimeChangeBannerComponentFactory @inject */
    public $TCBPC;

    /** @var IAsideBannerComponentFactory @inject */
    public $ABCF;

    /** @var IRefreshBannerComponentFactory @inject */
    public $RBCF;

    /** @var ICurrencyComponentFactory @inject */
    public $CCF;

    /** @var IDayInfoComponentFactory @inject */
    public $DICF;

    /** @var ISurveyComponentFactory @inject */
    public $SCF;

    public function createComponentDayInfoComponent()
    {
        return $this->DICF->create();
    }

    public function createComponentAssideBannerComponent()
    {
        return $this->ABCF->create();
    }

    public function createComponentRefreshBannerComponent()
    {
        return $this->RBCF->create();
    }

    public function createComponentBannerComponent()
    {
        return $this->TCBPC->create($this->BPR->getTimeChangePhoto(), 2);
    }

    public function createComponentCurrencyComponent()
    {
        return $this->CCF->create();
    }

    public function createComponentSurveyComponent()
    {
        return $this->SCF->create();
    }

}
