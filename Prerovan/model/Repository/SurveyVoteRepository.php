<?php

namespace Prerovan\Model\Repository;

class SurveyVoteRepository extends BaseRepository
{
    public function ipAddressVoted($ip)
    {
        $fluent = $this->createFluent()->where('[survey_vote.ip_address] = %i', $ip);
        $row = $fluent->fetch();
        return $row;

    }
}