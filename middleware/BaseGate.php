<?php

/**
 * Class BaseGate
 *
 * @package app\core\middleware
 * @author Ryan Pienaar <ryan@ryanpienaar.dev>
 */

namespace app\core\middleware;

abstract class BaseGate
{
    abstract public function execute();
}