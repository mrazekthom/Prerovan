<?php

namespace Prerovan\Model\Repository;


class ArticleRepository extends BaseRepository
{

    public function getArticles($count)
    {
        $fluent = $this->createFluent()->applyFilter("limit", $count);
        $fluent = $fluent->fetchAll();
        return $this->createEntities($fluent);
    }

}