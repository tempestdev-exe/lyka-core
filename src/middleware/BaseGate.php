<?php

/**
 * Class BaseGate
 *
 * @package ryanp\paprikacore\middleware
 * @author Ryan Pienaar <ryan@ryanpienaar.dev>
 */

namespace ryanp\paprikacore\middleware;

abstract class BaseGate
{
    abstract public function execute();
}