<?php

namespace Prerovan\Model\Factory;

use LeanMapper\Repository;
use Nette\Object;
use Prerovan\Model\Repository\BannersPhotoRepository;
use Prerovan\Model\Repository\RefreshBannerRepository;
use Prerovan\Model\Entity\RefreshBanner;

class RefreshBannerFactory extends Object
{
    /** @var  BannersPhotoRepository */
    private $BPR;

    /** @var  RefreshBannerRepository */
    private $RBR;

    public function __construct(BannersPhotoRepository $BPR, RefreshBannerRepository $RBR){
        $this->BPR = $BPR;
        $this->RBR = $RBR;
    }

    public function getNextRefreshBanner(){
        $lastBannerID = $this->RBR->getLastShowBanner()->bannersPhoto->id;
        $banners = $this->BPR->getRefreshBannerPhoto();
        foreach ($banners as $banner){
            if ($banner->id == $lastBannerID){
                if (current($banners)){
                    $nextBanner = current($banners);
                    break;
                }else{
                    $nextBanner = reset($banners);
                    break;
                }
            }
        }
        $this->writeShowToDatabase($nextBanner);
        return $nextBanner;
    }

    private function writeShowToDatabase($banner){
        $refreshBanner = New RefreshBanner();
        $refreshBanner->ipAddress = $_SERVER['REMOTE_ADDR'];
        $refreshBanner->bannersPhoto = $banner;
        $this->RBR->persist($refreshBanner);
    }

}