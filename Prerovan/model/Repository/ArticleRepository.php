<?php

namespace Prerovan\Model\Repository;


class ArticleRepository extends BaseRepository
{
    public function getArticles()
    {
        $fluent = $this->createFluent()->applyFilter("limit", 10);
        $fluent = $fluent->fetchAll();
        return $this->createEntities($fluent);
    }
}