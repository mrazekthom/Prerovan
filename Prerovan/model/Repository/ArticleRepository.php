<?php

namespace Prerovan\Model\Repository;


class ArticleRepository extends BaseRepository
{
    public function getArticles()
    {
        $fluent = $this->createFluent()->where('confirmed = 1');
        $fluent = $fluent->fetchAll();
        return $this->createEntities($fluent);
    }
}