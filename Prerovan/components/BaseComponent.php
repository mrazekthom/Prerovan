<?php

namespace Prerovan\Components;

use Nette\Application\UI\Control;
use Nette\Application\UI\Presenter;
use Prerovan\Misc\FilterLoader;

abstract class BaseComponent extends Control
{

    /**
     * @var FilterLoader
     */
    protected $filterLoader;

    /**
     * @param FilterLoader $filterLoader
     */
    public function injectFilterLoader(FilterLoader $filterLoader)
    {
        $this->filterLoader = $filterLoader;
    }

    /**
     * @param $presenter
     */
    protected function attached($presenter)
    {
        if ($presenter instanceof Presenter) {
            $presenter->context->callInjects($this);
        }
        parent::attached($presenter);
    }

    /**
     * adding views
     * @return \Nette\Application\UI\ITemplate
     */
    protected function createTemplate()
    {
        $template = $this->filterLoader->loadFilters(parent::createTemplate());
        $dir = $this->presenter->context->parameters['appDir'];
        $name = $this->reflection->shortName;
        $template->setFile("$dir/components/templates/$name.latte");
        return $template;
    }

}