<?php

namespace Prerovan\Model\Entity;

use LeanMapper\Entity;


/**
 * @property int                  $id
 * @property string               $ipAddress
 * @property BannersPhoto         $bannersPhoto m:hasOne
 */
class RefreshBanner extends Entity
{

}