<?php

namespace Prerovan\Components;

interface IListOfRssFeedComponentFactory{

    /**
     * @param $rssCategory
     * @return ListOfRssFeedComponent
     */
    public function create($rssCategory);

}