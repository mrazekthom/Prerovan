<?php

namespace Prerovan\Presenters;

use Nette\Application\UI\Presenter;
use Nette\Utils\Strings;
use Prerovan\Model;


/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Presenter
{

    /**
     * Formats layout template file names.
     * @return array
     */
    public function formatLayoutTemplateFiles()
    {
        $layout = $this->layout ? $this->layout : 'layout';
        $dir = $this->context->parameters['appDir'];
        $names = Strings::split($this->getName(), '(:)');
        $module = $names[0];
        $presenter = $names[1];
        $dir = is_dir("$dir/templates") ? $dir : dirname($dir);
        $list = array(
            "$dir/templates/$module/@$layout.latte",
            "$dir/templates/$module.@$layout.latte",
        );
        do {
            $list[] = "$dir/templates/@$layout.latte";
            $dir = dirname($dir);
        } while ($dir && ($name = substr($presenter, 0, strrpos($presenter, ':'))));

        return $list;
    }


    /**
     * Formats view template file names.
     * @return array
     */
    public function formatTemplateFiles()
    {
        $dir = $this->context->parameters['appDir'];
        $names = Strings::split($this->getName(), '(:)');
        $module = $names[0];
        $presenter = $names[1];
        $dir = is_dir("$dir/templates") ? $dir : dirname($dir);
        $list = array(
            "$dir/templates/$module.$presenter.$this->view.latte",
            "$dir/templates/$module/$presenter.$this->view.latte",
            "$dir/templates/$module/$presenter/$this->view.latte",
        );
        return $list;
    }

}
