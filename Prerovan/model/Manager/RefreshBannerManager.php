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

    /**
     * Get refresh banner
     *
     * @return mixed
     */
    public function getRefreshBanner()
    {
        return $this->RBF->getNextRefreshBanner();
    }

}