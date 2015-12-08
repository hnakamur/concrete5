<?php

namespace Concrete\Core\View;

use Concrete\Core\Asset\Asset;
use Concrete\Core\Http\ResponseAssetGroup;
use Environment;
use Events;
use PageTheme;
use Page;
use Config;

class ElementView extends AbstractView
{
    protected $pkgHandle;
    protected $element;

    protected function constructView($element)
    {
        $this->element = $element;
    }

    public function setPackageHandle($pkgHandle)
    {
        $this->pkgHandle = $pkgHandle;
    }

    /**
     * Begin the render.
     */
    public function start($state)
    {
        $this->controller->runTask('view', array());
    }

    protected function onBeforeGetContents()
    {
    }

    public function action($action)
    {
        $a = func_get_args();
        $c = \Page::getCurrentPage();
        array_unshift($a, $c);
        return call_user_func_array(array('\URL', 'to'), $a);
    }

    public function setupRender()
    {
        $env = Environment::get();
        $this->setViewTemplate(
            $env->getPath(DIRNAME_ELEMENTS . '/' . $this->element . '.php', $this->pkgHandle)
        );
    }

    public function finishRender($contents)
    {
        print $contents;
    }


}
