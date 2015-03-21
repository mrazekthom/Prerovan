<?php

namespace Prerovan\Model\Entity;

use LeanMapper\Entity;


/**
 * @property int                  $id
 * @property string               $slug
 * @property Tag                  $tag_id m:hasOne()
 * @property string               $title
 * @property string|NULL          $content
 * @property User                 $user_id m:hasOne()
 * @property \Datetime|NULL       $conformed
 * @property \Datetime            $inserted
 */
class Article extends Entity
{

}