<?php

namespace Prerovan\Presenters;

use Nette\Application\UI\Multiplier;
use Nette\Application\UI\Presenter;
use Prerovan\Components\ITimeChangeBannerComponentFactory;
use Prerovan\Components\ICurrencyComponentFactory;
use Prerovan\Model;
use Prerovan\Components\IAssideBannerComponentFactory;
use Prerovan\Components\IRefreshBannerComponentFactory;


/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Presenter {

    /** @var Model\Repository\BannersPhotoRepository @inject */
    public $BPR;

    /** @var ITimeChangeBannerComponentFactory @inject */
    public $TCBPC;

    /** @var IAssideBannerComponentFactory @inject */
    public $ABCF;

    /** @var IRefreshBannerComponentFactory @inject */
    public $RBCF;

    /** @var ICurrencyComponentFactory @inject */
    public $CCF;

    public function createComponentAssideBannerComponent(){
        return $this->ABCF->create();
    }

    public function createComponentRefreshBannerComponent(){
        return $this->RBCF->create();
    }

    public function createComponentBannerComponent() {
        return $this->TCBPC->create($this->BPR->getTimeChangePhoto(), 2);
    }

    public function createComponentCurrencyComponent(){
        return $this->CCF->create();
    }
}
