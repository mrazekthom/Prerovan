<?php

namespace Prerovan\Model\Repository;


class RssfeedRepository extends BaseRepository
{
    public function getRssSlug($rssCategory)
    {
        $row = $this->createFluent()->select('slug')->where("name = '$rssCategory'")->fetch();
        return $row->slug;
    }
}