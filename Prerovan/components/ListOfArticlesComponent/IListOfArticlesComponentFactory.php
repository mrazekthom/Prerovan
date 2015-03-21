<?php

namespace Prerovan\Components;

interface IListOfArticlesComponentFactory
{
    /**
     * @param $count
     * @return ListOfArticlesComponent
     */
    public function create($count);
}