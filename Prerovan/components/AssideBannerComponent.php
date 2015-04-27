<?php

namespace Prerovan\Components;

use Prerovan\Model\Repository\BannersPhotoRepository;

class AssideBannerComponent extends BaseComponent
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

interface IAssideBannerComponentFactory{

    /**
     * @return AssideBannerComponent
     */
    public function create();

}