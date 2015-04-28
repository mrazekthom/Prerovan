<?php

namespace Prerovan\Components;

use Prerovan\Model\Repository\AdvertisingRepository;

class AdvertisingMainComponent extends BaseComponent
{
    /** @var  AdvertisingRepository */
    private $AR;

    public function __construct(AdvertisingRepository $AR)
    {
        $this->AR = $AR;
    }

    public function render()
    {
        $this->template->advertising = $this->AR->getAdvertising();
        $this->template->render();
    }
}

interface IAdvertisingMainComponentFactory{

    /**
     * @return AdvertisingMainComponent
     */
    public function create();

}