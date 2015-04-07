<?php

namespace Prerovan\Components;

interface ISurveyComponentFactory{

    /**
     * @return SurveyComponent
     */
    public function create();

}