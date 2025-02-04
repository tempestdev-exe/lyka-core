<?php

/**
 * Class AuthGate
 *
 * @package ryanp\lykacore\middleware
 * @author Ryan Pienaar <ryan@ryanpienaar.dev>
 */

namespace ryanp\lykacore\middleware;

use ryanp\lykacore\exception\ForbiddenException;
use ryanp\lykacore\Kernel;

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