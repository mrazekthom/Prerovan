<?php

namespace Prerovan\Presenters;

use Nette\Application\UI\Multiplier;
use Nette\Application\UI\Presenter;
use Prerovan\Components\ITimeChangeBannerComponentFactory;
use Prerovan\Components\ICurrencyComponentFactory;
use Prerovan\Model;


/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Presenter {

    /** @var Model\Repository\BannersPhotoRepository @inject */
    public $BPR;

    /** @var ITimeChangeBannerComponentFactory @inject */
    public $TCBPC;

    /** @var ICurrencyComponentFactory @inject */
    public $CCF;


    public function createComponentBannerComponent() {
        return $this->TCBPC->create($this->BPR->getTimeChangePhoto(), 2);
    }

    public function createComponentCurrencyComponent(){
        return $this->CCF->create();
    }
}
