<?php

namespace Prerovan\Components;

use Nette\Utils\Random;
use Prerovan\Model\Entity\BannersPhoto;

class TimeChangeBannerComponent extends BaseComponent {

    /** @var BannersPhoto[] */
    private $banners;

    /** @var int */
    private $delay;

    /**
     * @param BannersPhoto[] $banners
     * @param int $delay
     */
    public function __construct(array $banners, $delay) {
        shuffle($banners);
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
        $this->template->delay = (int) ($this->delay * 1000);
        $this->template->render();
    }

}

interface ITimeChangeBannerComponentFactory {

    /**
     * @param BannersPhoto[] $banners
     * @param $delay
     * @return TimeChangeBannerComponent
     */
    public function create(array $banners, $delay);

}