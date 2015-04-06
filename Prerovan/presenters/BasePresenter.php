<?php

namespace Prerovan\Presenters;

use Nette\Application\UI\Multiplier;
use Nette\Application\UI\Presenter;
use Prerovan\Components\ITimeChangeBannerComponentFactory;
use Prerovan\Model;


/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Presenter {

    /** @var Model\Repository\BannersPhotoRepository @inject */
    public $BPR;

    /** @var ITimeChangeBannerComponentFactory @inject */
    public $TCBPC;

    /**
     * @return Multiplier
     */
    public function createComponentBannerComponent() {
        return new Multiplier(function($i) {
            return $this->TCBPC->create($this->BPR->getTimeChangePhoto(), 2);
        });
    }
}
