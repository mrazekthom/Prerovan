<?php

namespace Prerovan\Components;

use Prerovan\Model\Repository\SurveyRepository;

class SurveyComponent extends BaseComponent
{

    /** @var  SurveyRepository */
    private $SR;

    public function __construct(SurveyRepository $SR){
        $this->SR = $SR;
    }

    public function render()
    {
        foreach ($this->SR->ss() as $item) {
            $name = $item->surveyCategory->name;
        }
        $this->template->name = $name;
        $this->template->survey = $this->SR->ss();
        $this->template->render();
    }

}