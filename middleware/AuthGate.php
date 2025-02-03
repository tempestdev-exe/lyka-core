<?php

/**
 * Class AuthGate
 *
 * @package app\core\middleware
 * @author Ryan Pienaar <ryan@ryanpienaar.dev>
 */

namespace app\core\middleware;

use app\core\exception\ForbiddenException;
use app\core\Kernel;

class AuthGate extends BaseGate
{
    public array $actions;

    public function __construct(array $actions = [])
    {
        $this->actions = $actions;
    }

    /**
     * @throws ForbiddenException
     */
    public function execute()
    {
        if (Kernel::isGuest()) {
            if (empty($this->actions) || in_array(Kernel::$kernel->controller->action, $this->actions)) {
                throw new ForbiddenException();
            }
        }
    }
}