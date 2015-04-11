<?php

namespace Prerovan\Model\Manager;

use Nette\Object;
use Prerovan\Model\Factory\RefreshBannerFactory;

class RefreshBannerManager extends Object
{

    /** @var RefreshBannerFactory */
    private $RBF;

    public function __construct(RefreshBannerFactory $RBF)
    {
        $this->RBF = $RBF;
    }

    public function getRefreshBanner(){
        return $this->RBF->getNextRefreshBanner();
    }

}