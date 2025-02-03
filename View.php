<?php

/**
 * Class View
 *
 * @package app\core
 * @author Ryan Pienaar <ryan@ryanpienaar.dev>
 */

namespace app\core;

class View
{
    public string $title = '';

    public function renderView($view, $params = [])
    {
        $viewContent = $this->renderOnlyViewContent($view, $params);
        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    protected function layoutContent()
    {
        $layout = Kernel::$kernel->layout;
        if (Kernel::$kernel->controller) {
            $layout = Kernel::$kernel->controller->layout;
        }
        ob_start();
        include_once Kernel::$ROOT_DIR . "/views/layouts/$layout.php";
        return ob_get_clean();
    }

    protected function renderOnlyViewContent($view, $params)
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once Kernel::$ROOT_DIR . "/views/$view.php";
        return ob_get_clean();
    }
}