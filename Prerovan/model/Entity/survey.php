<?php

namespace Prerovan\Model\Entity;

use LeanMapper\Entity;


/**
 * @property int                  $id
 * @property string               $name
 * @property integer              $counter
 * @property SurveyCategory       $surveyCategory m:hasOne
 */
class Survey extends Entity
{

}