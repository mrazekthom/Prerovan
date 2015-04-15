<?php

namespace Prerovan\Components;

use Prerovan\Model\Repository\SurveyRepository;
use Prerovan\Model\Manager\SurveyManager;

class SurveyComponent extends BaseComponent
{

    /** @var  SurveyRepository */
    private $SR;

    /** @var  SurveyManager */
    private $SM;

    public function __construct(SurveyRepository $SR, SurveyManager $SM){
        $this->SR = $SR;
        $this->SM = $SM;
    }

    public function render()
    {
        $counter = 0;
        foreach ($this->SR->actualSurvey() as $item) {
            $name = $item->surveyCategory->name;
            $counter += $item->counter;
        }
        $this->template->name = $name;
        $this->template->counter = $counter;
        $this->template->survey = $this->SR->actualSurvey();
        $this->template->render();
    }

    public function handleVote($id){
        $this->SM->vote($id);
        $this->presenter->redirect(":Homepage:default");
    }

}