<?php

namespace Prerovan\Model;


use LeanMapper\Fluent;
use Nette\Object;

class Filters extends Object{
    /**
     * @param Fluent $fluent
     */
    public function confirmedArticle(Fluent $fluent)
    {
        $fluent->where('[article.confirmed] = 1');
    }

    public function limit(Fluent $fluent, $limit = NULL)
    {
        if ($limit) {
            $fluent->limit($limit);
        }
    }
}