<?php

/**
 * Class Controller
 *
 * @package app\core
 * @author Ryan Pienaar <ryan@ryanpienaar.dev>
 */

namespace app\core;

use app\core\middleware\BaseGate;

class Controller
{
    public string $layout = 'main';
    public string $action = '';
    /**
     * @var \app\core\middleware\BaseGate[]
     */
    protected array $gates = [];
    public function setLayout($layout)
    {
        $this->layout = $layout;
    }
    public function render($view, $params = [])
    {
        return Kernel::$kernel->view->renderView($view, $params);
    }

    public function registerGate(BaseGate $gate)
    {
        $this->gates[] = $gate;
    }

    public function getGates(): array
    {
        return $this->gates;
    }


}