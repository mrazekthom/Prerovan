<?php

namespace Prerovan\Model\Repository;

use LeanMapper\Repository;

class ArticleRepository extends BaseRepository
{
    public function getArticles()
    {
        $fluent = $this->createFluent()->where('confirmed = 0');
        $fluent = $fluent->fetchAll();
        return $this->createEntities($fluent);
    }
}

