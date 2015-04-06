<?php

namespace Prerovan\Components;

use Nette\Utils\Random;
use Prerovan\Model\Entity\BannersPhoto;

class TimeChangeBannerComponent extends BaseComponent {

    /** @var BannersPhoto[] */
    private $banners;

    /** @var int */
    private $delay;

    public function __construct(array $banners, $delay) {
        $this->banners = $banners;
        $this->delay = $delay;

    }

    public function render() {
        $this->template->id = Random::generate();
        $banners = [];
        foreach ($this->banners as $banner) {
            $banners[$banner->id] = $banner;
        }
        $this->template->banners = $banners;
        $this->template->delay = $this->delay * 1000;
        $this->template->render();
    }

}