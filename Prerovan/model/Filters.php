<?php

namespace Prerovan\Model;


use LeanMapper\Fluent;
use Nette\Object;

class Filters extends Object{
    /**
     * @param Fluent $fluent
     */
    public function confirmedArticle(Fluent $fluent, $use = TRUE)
    {
        if ($use){
            $fluent->where('[article.confirmed] = 1')->orderBy('inserted desc');
        }
    }

    public function confirmedPhoto(Fluent $fluent, $use = TRUE)
    {
        if ($use){
            $fluent->where('[banners_photo.confirmed] = 1');
        }
    }

    public function limit(Fluent $fluent, $limit = NULL)
    {
        if ($limit) {
            $fluent->limit($limit);
        }
    }
}