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
        $vote = $this->SR->get($id);
        $vote->counter += 1;
        $this->SR->persist($vote);
        $this->presenter->redirect(":Homepage:default");
    }

}