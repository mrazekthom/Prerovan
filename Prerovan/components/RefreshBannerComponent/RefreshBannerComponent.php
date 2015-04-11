<?php

namespace Prerovan\Components;

use Prerovan\Model\Manager\RefreshBannerManager;

class RefreshBannerComponent extends BaseComponent
{
    /** @var  RefreshBannerManager */
    private $RBM;

    public function __construct(RefreshBannerManager $RBM){
        $this->RBM = $RBM;
    }

    public function render()
    {
        $this->template->banner = $this->RBM->getRefreshBanner();
        $this->template->render();
    }

}