<?php

/**
 * Class AuthGate
 *
 * @package paprikadev\paprikacore\middleware
 * @author Ryan Pienaar <ryan@ryanpienaar.dev>
 */

namespace paprikadev\paprikacore\middleware;

use paprikadev\paprikacore\exception\ForbiddenException;
use paprikadev\paprikacore\Kernel;

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