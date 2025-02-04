<?php

/**
 * Class AuthGate
 *
 * @package ryanp\paprikacore\middleware
 * @author Ryan Pienaar <ryan@ryanpienaar.dev>
 */

namespace ryanp\paprikacore\middleware;

use ryanp\paprikacore\exception\ForbiddenException;
use ryanp\paprikacore\Kernel;

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