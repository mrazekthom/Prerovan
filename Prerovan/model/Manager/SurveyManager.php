<?php

namespace Prerovan\Model\Manager;

use Nette\Object;
use Nette\Utils\DateTime;
use Prerovan\Model\Entity\SurveyVote;
use Prerovan\Model\Repository\SurveyRepository;
use Prerovan\Model\Repository\SurveyVoteRepository;


class SurveyManager extends Object
{

    /** @var SurveyVoteRepository */
    private $SVR;

    /** @var  SurveyRepository */
    private $SR;

    public function __construct(SurveyVoteRepository $SVR, SurveyRepository $SR)
    {
        $this->SR = $SR;
        $this->SVR = $SVR;
    }

    public function vote($id)
    {
        $voted = $this->isVoted();
        if (!$voted) {
            $vote = $this->SR->get($id);
            $vote->counter += 1;
            $new = new SurveyVote();
            $new->surveyCategory = $vote->surveyCategory;
            $new->ipAddress = $_SERVER['REMOTE_ADDR'];
            $new->lastVote = DateTime::from('c');
            $this->SVR->persist($new);
            $this->SR->persist($vote);
        }elseif ($voted->lastVote < DateTime::from('c')->modify('-1 hour')){
            $vote = $this->SR->get($id);
            $vote->counter += 1;
            $voted->counter += 1;
            $this->SVR->persist($voted);
            $this->SR->persist($vote);
        }
    }

    private function isVoted()
    {
        $result = $this->SVR->ipAddressVoted($_SERVER['REMOTE_ADDR']);
        return $result;
    }

}