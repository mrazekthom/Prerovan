<?php

namespace Prerovan\Components;

interface IListOfRssFeedComponentFactory{

    /**
     * @param $rssChannel
     * @return ListOfRssFeedComponent
     */
    public function create($rssChannel);

}