<?php

namespace Prerovan\Components;

interface IListOfRssFeedComponentFactory{

    /**
     * @param $rssCategory
     * @param $count
     * @return ListOfRssFeedComponent
     */
    public function create($rssCategory, $count);

}