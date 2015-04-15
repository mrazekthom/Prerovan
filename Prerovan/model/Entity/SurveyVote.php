<?php

namespace Prerovan\Model\Entity;

use LeanMapper\Entity;


/**
 * @property integer             $id
 * @property surveyCategory      $surveyCategory m:hasOne
 * @property string              $ipAddress
 * @property integer             $counter
 * @property \Datetime           $lastVote
 */
class SurveyVote extends Entity
{

}