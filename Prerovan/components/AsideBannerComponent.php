<?php

namespace Prerovan\Components;

use Prerovan\Model\Repository\BannersPhotoRepository;

class AsideBannerComponent extends BaseComponent
{
    /** @var  BannersPhotoRepository */
    private $BPR;

    public function __construct(BannersPhotoRepository $BPR)
    {
        $this->BPR = $BPR;
    }

    public function render()
    {
        $this->template->banners = $this->BPR->getAssideBannerPhoto();
        $this->template->render();
    }
}

interface IAsideBannerComponentFactory
{

    /**
     * @return AsideBannerComponent
     */
    public function create();

}