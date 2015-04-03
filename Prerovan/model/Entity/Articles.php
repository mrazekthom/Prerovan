<?php

namespace Prerovan\Model\Entity;

use LeanMapper\Entity;


/**
 * @property int                  $id
 * @property string               $title
 * @property string               $type
 * @property string|NULL          $content
 * @property string|NULL          $url
 * @property string|NULL          $image
 * @property \Datetime            $inserted
 * @property boolean              $confirmed
 */
class Articles extends Entity
{

}