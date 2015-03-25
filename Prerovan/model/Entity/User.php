<?php

namespace Prerovan\Model\Entity;

use LeanMapper\Entity;


/**
 * @property int         $id
 * @property string      $username
 * @property string      $password_hash
 * @property string      $role
 * @property string      $full_name
 * @property Article[]   $articles m:belongsToMany()
 */
class User extends Entity
{

}